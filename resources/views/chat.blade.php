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

    <script>

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


        const joinChatRoom = document.getElementById("join-chatroom");
        joinChatRoom.onsubmit = (event) => {
            event.preventDefault();

            const username = document.getElementById("username");

            var peer = new Peer(username, peerOptions);



        }







    </script>

</x-app-layout>
