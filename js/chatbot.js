 // Variables del chatbot
        const chatbotMessages = document.getElementById('chatbotMessages');
        const chatbotUserInput = document.getElementById('chatbotUserInput');
        const chatbotContainer = document.getElementById('chatbotContainer');
        const chatbotToggle = document.getElementById('chatbotToggle');
        const chatbotQuickReplies = document.getElementById('chatbotQuickReplies');

        // Base de conocimientos del club
        const clubInfo = {
            contacto: {
                telefono: '+34 958 123 456',
                email: 'info@clubsocios.es',
                direccion: 'Calle Principal 123, Churriana de la Vega, Granada',
                whatsapp: '+34 600 123 456'
            },
            horarios: {
                general: 'Lunes a Viernes: 7:00 - 22:00, Sábados y Domingos: 8:00 - 21:00',
                sauna: 'Lunes a Domingo: 10:00 - 21:00',
                padel: 'Lunes a Domingo: 8:00 - 22:00',
                gimnasio: 'Lunes a Viernes: 6:00 - 23:00, Sábados y Domingos: 8:00 - 21:00'
            },
            servicios: {
                padel: {
                    nombre: 'Reserva de Pista de Pádel',
                    descripcion: 'Contamos con 4 pistas de pádel profesionales',
                    precio: '15€/hora',
                    reserva: 'Puedes reservar llamando al 958 123 456 o mediante nuestra app'
                },
                sauna: {
                    nombre: 'Servicio de Sauna',
                    descripcion: 'Sauna finlandesa y baño turco',
                    precio: 'Incluido en la cuota de socio',
                    acceso: 'Acceso libre durante el horario de apertura'
                },
                gimnasio: {
                    nombre: 'Sala de Máquinas',
                    descripcion: 'Gimnasio completamente equipado con máquinas cardiovasculares y de musculación',
                    precio: 'Incluido en la cuota de socio',
                    entrenador: 'Entrenador personal disponible con cita previa'
                }
            }
        };

        // Opciones de respuesta rápida
        const quickReplyOptions = [
            { text: '📞 Contacto', value: 'contacto' },
            { text: '🕐 Horarios', value: 'horarios' },
            { text: '🎾 Pádel', value: 'padel' },
            { text: '🧖 Sauna', value: 'sauna' },
            { text: '💪 Gimnasio', value: 'gimnasio' }
        ];

        // Inicializar chatbot
        function initChatbot() {
            addChatbotBotMessage('¡Hola! Bienvenido al Club de Socios. Soy tu asistente virtual. ¿En qué puedo ayudarte hoy?');
            showChatbotQuickReplies();
        }

        // Añadir mensaje del bot
        function addChatbotBotMessage(text) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'chatbot-message bot';
            messageDiv.innerHTML = `<div class="chatbot-message-content">${text}</div>`;
            chatbotMessages.appendChild(messageDiv);
            scrollChatbotToBottom();
        }

        // Añadir mensaje del usuario
        function addChatbotUserMessage(text) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'chatbot-message user';
            messageDiv.innerHTML = `<div class="chatbot-message-content">${text}</div>`;
            chatbotMessages.appendChild(messageDiv);
            scrollChatbotToBottom();
        }

        // Procesar mensaje del usuario
        function processChatbotMessage(message) {
            const lowerMessage = message.toLowerCase();
            
            // Contacto
            if (lowerMessage.includes('contacto') || lowerMessage.includes('teléfono') || 
                lowerMessage.includes('telefono') || lowerMessage.includes('email') || 
                lowerMessage.includes('dirección') || lowerMessage.includes('direccion') ||
                lowerMessage.includes('whatsapp')) {
                return `📞 <strong>Información de Contacto:</strong><br><br>
                        📱 Teléfono: ${clubInfo.contacto.telefono}<br>
                        📧 Email: ${clubInfo.contacto.email}<br>
                        📍 Dirección: ${clubInfo.contacto.direccion}<br>
                        💬 WhatsApp: ${clubInfo.contacto.whatsapp}`;
            }
            
            // Horarios generales
            if (lowerMessage.includes('horario') && !lowerMessage.includes('sauna') && 
                !lowerMessage.includes('padel') && !lowerMessage.includes('pádel') &&
                !lowerMessage.includes('gimnasio') && !lowerMessage.includes('máquinas')) {
                return `🕐 <strong>Horarios del Club:</strong><br><br>
                        🏢 General: ${clubInfo.horarios.general}<br><br>
                        Servicios específicos:<br>
                        🎾 Pádel: ${clubInfo.horarios.padel}<br>
                        🧖 Sauna: ${clubInfo.horarios.sauna}<br>
                        💪 Gimnasio: ${clubInfo.horarios.gimnasio}`;
            }
            
            // Pádel
            if (lowerMessage.includes('padel') || lowerMessage.includes('pádel') || 
                lowerMessage.includes('pista') || lowerMessage.includes('reserva')) {
                return `🎾 <strong>${clubInfo.servicios.padel.nombre}</strong><br><br>
                        ${clubInfo.servicios.padel.descripcion}<br><br>
                        💰 Precio: ${clubInfo.servicios.padel.precio}<br>
                        📅 Reservas: ${clubInfo.servicios.padel.reserva}<br>
                        🕐 Horario: ${clubInfo.horarios.padel}`;
            }
            
            // Sauna
            if (lowerMessage.includes('sauna') || lowerMessage.includes('baño') || 
                lowerMessage.includes('turco')) {
                return `🧖 <strong>${clubInfo.servicios.sauna.nombre}</strong><br><br>
                        ${clubInfo.servicios.sauna.descripcion}<br><br>
                        💰 ${clubInfo.servicios.sauna.precio}<br>
                        🚪 ${clubInfo.servicios.sauna.acceso}<br>
                        🕐 Horario: ${clubInfo.horarios.sauna}`;
            }
            
            // Gimnasio
            if (lowerMessage.includes('gimnasio') || lowerMessage.includes('máquinas') || 
                lowerMessage.includes('maquinas') || lowerMessage.includes('sala') ||
                lowerMessage.includes('entrenador')) {
                return `💪 <strong>${clubInfo.servicios.gimnasio.nombre}</strong><br><br>
                        ${clubInfo.servicios.gimnasio.descripcion}<br><br>
                        💰 ${clubInfo.servicios.gimnasio.precio}<br>
                        👨‍🏫 ${clubInfo.servicios.gimnasio.entrenador}<br>
                        🕐 Horario: ${clubInfo.horarios.gimnasio}`;
            }
            
            // Servicios generales
            if (lowerMessage.includes('servicio') || lowerMessage.includes('qué ofrece') || 
                lowerMessage.includes('que ofrece') || lowerMessage.includes('instalaciones')) {
                return `✨ <strong>Nuestros Servicios:</strong><br><br>
                        🎾 Reserva de Pistas de Pádel<br>
                        🧖 Servicio de Sauna y Baño Turco<br>
                        💪 Sala de Máquinas / Gimnasio<br><br>
                        ¿Sobre qué servicio te gustaría saber más?`;
            }
            
            // Precio/Cuota
            if (lowerMessage.includes('precio') || lowerMessage.includes('cuota') || 
                lowerMessage.includes('coste') || lowerMessage.includes('cuesta')) {
                return `💰 <strong>Información de Precios:</strong><br><br>
                        🎾 Pádel: ${clubInfo.servicios.padel.precio}<br>
                        🧖 Sauna: ${clubInfo.servicios.sauna.precio}<br>
                        💪 Gimnasio: ${clubInfo.servicios.gimnasio.precio}<br><br>
                        Para información sobre cuotas de socio, contacta con nosotros.`;
            }
            
            // Saludo
            if (lowerMessage.includes('hola') || lowerMessage.includes('buenos') || 
                lowerMessage.includes('buenas')) {
                return '¡Hola! 👋 Estoy aquí para ayudarte con información sobre el club. ¿Qué necesitas saber?';
            }
            
            // Gracias
            if (lowerMessage.includes('gracias') || lowerMessage.includes('perfecto') || 
                lowerMessage.includes('vale') || lowerMessage.includes('ok')) {
                return '¡De nada! 😊 Si necesitas algo más, aquí estoy para ayudarte.';
            }
            
            // Respuesta por defecto
            return `No estoy seguro de cómo ayudarte con eso. Puedo informarte sobre:<br><br>
                    📞 Información de contacto<br>
                    🕐 Horarios del club<br>
                    🎾 Reserva de pistas de pádel<br>
                    🧖 Servicio de sauna<br>
                    💪 Sala de máquinas/gimnasio<br><br>
                    ¿Sobre qué te gustaría saber?`;
        }

        // Mostrar respuestas rápidas
        function showChatbotQuickReplies() {
            chatbotQuickReplies.innerHTML = '';
            quickReplyOptions.forEach(option => {
                const btn = document.createElement('button');
                btn.className = 'quick-reply-btn';
                btn.textContent = option.text;
                btn.onclick = () => handleChatbotQuickReply(option.value, option.text);
                chatbotQuickReplies.appendChild(btn);
            });
        }

        // Manejar respuesta rápida
        function handleChatbotQuickReply(value, text) {
            addChatbotUserMessage(text);
            setTimeout(() => {
                const response = processChatbotMessage(value);
                addChatbotBotMessage(response);
            }, 800);
        }

        // Enviar mensaje
        function chatbotSendMessage() {
            const message = chatbotUserInput.value.trim();
            if (message === '') return;

            addChatbotUserMessage(message);
            chatbotUserInput.value = '';

            setTimeout(() => {
                const response = processChatbotMessage(message);
                addChatbotBotMessage(response);
            }, 1000);
        }

        // Scroll al final
        function scrollChatbotToBottom() {
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        }

        // Event listener para Enter
        chatbotUserInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                chatbotSendMessage();
            }
        });

        // Toggle chatbot
        chatbotToggle.addEventListener('click', () => {
            if (chatbotContainer.style.display === 'none' || chatbotContainer.style.display === '') {
                chatbotContainer.style.display = 'flex';
                if (chatbotMessages.children.length === 0) {
                    initChatbot();
                }
            } else {
                chatbotContainer.style.display = 'none';
            }
        });

        // Inicializar chatbot si está visible
        if (chatbotContainer.style.display === 'flex') {
            initChatbot();
        }