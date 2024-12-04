// JavaScript Document
  function sendMessage() {
    var userInput = document.getElementById('user-input').value;
    if (userInput.trim() === '') return;

    var chatContainer = document.getElementById('chat-container');
    var userMessage = '<div class="alert alert-primary" role="alert">' + userInput + '</div>';
    chatContainer.innerHTML += userMessage;

    // You can replace this part with your chatbot logic to generate a response
    var botResponse = '<div class="alert alert-secondary" role="alert">Bot: Thanks for your message!</div>';
    chatContainer.innerHTML += botResponse;

    document.getElementById('user-input').value = ''; // Clear input field
    chatContainer.scrollTop = chatContainer.scrollHeight; // Scroll to the bottom
  }