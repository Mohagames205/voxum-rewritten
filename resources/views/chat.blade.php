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
                    <form id="join-chatroom">
                        <x-text-input type="text" placeholder="Username" id="username" required autofocus/>
                        <x-primary-button type="submit">Join</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/peerjs@1.4.7/dist/peerjs.min.js"></script>

    <script type="module">
        const joinChatRoom = document.getElementById("join-chatroom");
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);


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

        const username = urlParams.get('username');
        const peer = new Peer(username, peerOptions);

        // peer has connected to peerjs server --> whisper to all others that a user has joined!
        peer.on("open", (id) => {
            console.log("peer js has opened!")
            // the user joined the voxum room of the server, dispatch to all other clients!
            Echo.join(`mainroom`)
                .whisper(`joined-room`, {username: id})
        })

        const stream = await navigator.mediaDevices.getUserMedia({
            video: false,
            audio: true
        });

        // when we get called by a user who joins the room, answer the call with our stream
        peer.on("call", call => {
            call.answer(stream)
            console.log("call answered from " + call.peer)
        });

        // listen for when a user joins the room, when this happens the user should be called!
        Echo.join(`mainroom`)
            .listenForWhisper('joined-room', (e) => {
                setTimeout(() => peer.call(e.username, stream), 1500)
                console.log("user has joined room... calling peer: " + e.username)
            });


    </script>

</x-app-layout>
