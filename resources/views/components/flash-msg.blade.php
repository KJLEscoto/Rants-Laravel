@props(['msg'])

<span class="flex items-center justify-center">
    <div id="flash-message-container" class="fixed top-16 z-[60] transform scale-50 opacity-0 animate-popup">
        <p class="w-[350px] h-auto py-3 px-5 text-center bg-black rounded text-white font-semibold text-sm">
            {{ session($msg) }}
        </p>
    </div>
</span>

<script>
    window.onload = function() {
        const flashMessageContainer = document.getElementById('flash-message-container');
        // const rantCard = document.getElementById('rant-card');


        setTimeout(() => {
            flashMessageContainer.classList.remove('animate-popup');
            flashMessageContainer.classList.add('animate-popdown');
            // rantCard.classList.remove('border-green-500');

        }, 1000);
    };
</script>

<style>
    @keyframes popup {
        0% {
            transform: scale(0.5);
            opacity: 0;
        }

        50% {
            transform: scale(1.05);
            opacity: 1;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes popdown {
        0% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(0.95);
            opacity: 0.8;
        }

        100% {
            transform: scale(0.5) translateY(20px);
            /* Move it down and shrink */
            opacity: 0;
        }
    }

    .animate-popup {
        animation: popup 0.5s ease-out forwards;
    }

    .animate-popdown {
        animation: popdown 0.5s ease-in forwards;
    }
</style>
