@extends('layouts.parent')
@section('title', 'Assistant IA')

@section('content')
    <h1>🤖 Assistant Bien-être IA</h1>
    <p>Posez vos questions sur le sport, la méditation, la nutrition ou le sommeil !</p>

    <div id="chat-box" style="
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        height: 400px;
        overflow-y: auto;
        background-color: #f9f9f9;
        margin-bottom: 15px;
    ">
        <div style="color: green; margin-bottom: 10px;">
            <strong>🤖 Assistant :</strong> Bonjour ! Je suis votre assistant bien-être. Comment puis-je vous aider aujourd'hui ?
        </div>
    </div>

    <div style="display: flex; gap: 10px;">
        <input type="text" id="user-input"
               placeholder="Écrivez votre question..."
               style="flex: 1; padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
        <button onclick="sendMessage()" style="padding: 10px 20px;">
            📤 Envoyer
        </button>
    </div>

    <script>
        async function sendMessage() {
            const input = document.getElementById('user-input');
            const chatBox = document.getElementById('chat-box');
            const message = input.value.trim();

            if (!message) return;

            // Afficher le message utilisateur
            chatBox.innerHTML += `
                <div style="text-align: right; margin: 10px 0;">
                    <span style="background-color: #4CAF50; color: white; padding: 8px 12px; border-radius: 15px;">
                        ${message}
                    </span>
                </div>`;

            input.value = '';
            chatBox.scrollTop = chatBox.scrollHeight;

            // Afficher "En train d'écrire..."
            chatBox.innerHTML += `
                <div id="typing" style="color: gray; margin: 10px 0;">
                    <strong>🤖 Assistant :</strong> En train d'écrire...
                </div>`;
            chatBox.scrollTop = chatBox.scrollHeight;

            // Envoyer au serveur
            const response = await fetch('{{ route("agent.chat") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: message })
            });

            const data = await response.json();

            // Supprimer "En train d'écrire..."
            document.getElementById('typing').remove();

            // Afficher la réponse IA
            chatBox.innerHTML += `
                <div style="color: green; margin: 10px 0;">
                    <strong>🤖 Assistant :</strong> ${data.reply}
                </div>`;
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        // Envoyer avec la touche Entrée
        document.getElementById('user-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') sendMessage();
        });
    </script>
@endsection