<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Stopwatches</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let stopwatches = JSON.parse(getCookie("stopwatches")) || [];
            stopwatches.forEach(sw => {
                let div = addStopwatch(sw.name, sw.description, sw.time, sw.running);
                if (sw.running) startTimer(div);
            });
        });

        function addStopwatch(name = "", description = "", time = 0, running = false) {
            let container = document.getElementById("stopwatch-container");
            let div = document.createElement("div");
            div.classList.add("stopwatch");
            div.innerHTML = `
                <input type="text" value="${name}" placeholder="Stopwatch Name">
                <span class="time">${formatTime(time)}</span>
                <button onclick="toggleStopwatch(this)">${running ? "Stop" : "Start"}</button>
                <button onclick="removeStopwatch(this)">Remove</button>
                <textarea placeholder="Description">${description}</textarea>
            `;
            container.appendChild(div);
            return div;
        }

        function toggleStopwatch(button) {
            let div = button.parentElement;
            if (button.textContent === "Start") {
                startTimer(div);
                button.textContent = "Stop";
            } else {
                clearInterval(div.timer);
                div.timer = null;
                button.textContent = "Start";
                saveStopwatches();
            }
        }

        function startTimer(div) {
            let timeSpan = div.querySelector(".time");
            div.timer = setInterval(() => {
                let time = parseTime(timeSpan.textContent) + 1;
                timeSpan.textContent = formatTime(time);
                saveStopwatches();
            }, 1000);
        }

        function removeStopwatch(button) {
            button.parentElement.remove();
            saveStopwatches();
        }

        function saveStopwatches() {
            let stopwatches = [];
            document.querySelectorAll(".stopwatch").forEach(div => {
                stopwatches.push({
                    name: div.querySelector("input").value,
                    description: div.querySelector("textarea").value,
                    time: parseTime(div.querySelector(".time").textContent),
                    running: !!div.timer
                });
            });
            document.cookie = `stopwatches=${JSON.stringify(stopwatches)}; path=/`;
        }

        function getCookie(name) {
            let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            return match ? decodeURIComponent(match[2]) : "";
        }

        function parseTime(str) {
            let [h, m, s] = str.split(":").map(Number);
            return h * 3600 + m * 60 + s;
        }

        function formatTime(seconds) {
            let h = Math.floor(seconds / 3600).toString().padStart(2, '0');
            let m = Math.floor((seconds % 3600) / 60).toString().padStart(2, '0');
            let s = (seconds % 60).toString().padStart(2, '0');
            return `${h}:${m}:${s}`;
        }
    </script>
</head>
<body>
    <h1>Multiple Stopwatches</h1>
    <button onclick="addStopwatch()">Add Stopwatch</button>
    <div id="stopwatch-container"></div>
</body>
</html>
