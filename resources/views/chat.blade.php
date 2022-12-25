<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Voice chat
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div id="audio-elements"></div>
                    <div id="user-list"></div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/peerjs@1.4.7/dist/peerjs.min.js"></script>

    <script type="module">
        const userList = document.getElementById("user-list");
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

        const peerUsers = {}
        const socketUsers = {}

        var peerOptions = {
            host: "127.0.0.1",
            port: 3000,
            path: "/",
            config: { 'iceServers': [
                    { urls: 'stun:stun.l.google.com:19302' },
                    { urls: 'stun:stun1.l.google.com:19302' },
                    { urls: 'stun:stun2.l.google.com:19302' },
                    { urls: 'stun:stun3.l.google.com:19302' },
                ]}, debug: false
        }

        const username = "{!! auth()->user()->name !!}";

        const peer =  new Peer(username, peerOptions);


        // self has connected to peerjs
        peer.on("open", selfHasJoinedRoom)

        const stream = await navigator.mediaDevices.getUserMedia({
            video: false,
            audio: true
        });

        // when we get called by a user who joins the room, answer the call with our stream
        peer.on("call", handlePeerCall);

        // listen for when a user joins the room, when this happens the user should be called!
        Echo.join(`mainroom`)
            .leaving(peerLeftRoom)
            // do not use the default .joining() event, because we can only call the user whenever PeerJS is ready
            .listenForWhisper('joined-room', peerJoinedRoom)


        // handles incoming peer call
        // sends our own stream to the calling user
        // dispatches the stream of the user
        function handlePeerCall(call) {
            call.answer(stream)
            console.log("call answered from " + call.peer)

            call.on("stream", (stream) => handleRemoteStreamRequest(call, stream));
        }

        // handles incoming stream of other users
        function handleRemoteStreamRequest(call, stream) {
            addUserToCanvas(call, stream);
        }

        // is called when this user has joined the room
        function selfHasJoinedRoom(id) {
            // peer has connected to peerjs server --> whisper to all others that a user has joined!
            console.log("self has joined the room with id" + id)
            setTimeout(() => Echo.join(`mainroom`)
                .whisper(`joined-room`, {username: id}), 1500)
        }

        // is called when someone else joins the room
        function peerJoinedRoom(e) {
            console.log("peer has joined the room!")
            setTimeout(() => {
                const call = peer.call(e.username, stream)
                addUserToCanvas(call, stream);
            }, 1500)
            console.log("user has joined room... calling peer: " + e.username)
        }


        function peerLeftRoom(username) {

            document.getElementById(`${username}-profile`).remove();
            document.getElementById(`${username}-audio`).remove();

            delete peerUsers[username]

            console.log(username + " left the room")
        }

        function addUserToCanvas(call, stream) {
            const username = call.peer

            if(peerUsers[username]) {
                console.log(username + " already exists?")
                return;
            }

            peerUsers[call.peer] = call

            // add the audio element
            const audio = document.createElement('audio');
            document.getElementById("audio-elements").appendChild(audio);

            audio.id = `${username}-audio`
            audio.srcObject = stream;
            audio.onloadedmetadata = () => {
                audio.play();
            };

            // add the html element
            const userElement = document.createElement("div");
            userElement.className = "user";
            userElement.id = `${username}-profile`
            userElement.innerHTML = `<div class='skin'><img id=${username}img width='90px' height='90px' src='https://via.placeholder.com/90'/></div><div class='text'>${username}</div>`

            document.getElementById("user-list").append(userElement);

            audio.srcObject = stream;
            audio.onloadedmetadata = () => {
                audio.play();
            }
        }


    </script>

</x-app-layout>
