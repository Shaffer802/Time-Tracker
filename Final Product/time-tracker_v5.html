<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
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
				<button id= "stopwatch-start-stop" onclick="toggleStopwatch(this)">${running ? "Stop" : "Start"}</button>
				<button id="remove-stopwatch" onclick="removeStopwatch(this)">Delete Note</button><br>
                <span class="stopwatch-count">${formatTime(time)}</span><br>
                <input class="stopwatch-title" type="text" value="${name}" placeholder="Stopwatch Name"><br>
                <textarea class="stopwatch-description" placeholder="Description">${description}</textarea><br><br><br>
            `;
            container.appendChild(div);
            return div;
        }

	function toggleStopwatch(button) {
		let div = button.parentElement;
		if (button.textContent === "Start") {
			startTimer(div);
			button.textContent = "Stop";
			button.style.backgroundColor = "red"; // Change to red when stopped
			button.style.color = "white"; // Ensure text is readable
		} else {
			clearInterval(div.timer);
			div.timer = null;
			button.textContent = "Start";
			button.style.backgroundColor = "green"; // Change to green when started
			button.style.color = "white"; // Ensure text is readable
			saveStopwatches();
		}
	}


        function startTimer(div) {
            let timeSpan = div.querySelector(".stopwatch-count");
            div.timer = setInterval(() => {
                let time = parseTime(timeSpan.textContent) + 1;
                timeSpan.textContent = formatTime(time);
                saveStopwatches();
            }, 1000);
        }

        function removeStopwatch(button) {
            if (confirm("Are you sure you want to delete this stopwatch?")){
				button.parentElement.remove();
				saveStopwatches();
			}
        }

        function clearAllStopwatches() {
            if (confirm ("All stopwatches will be deleted, are you sure?")) {
				document.getElementById("stopwatch-container").innerHTML = "";
				document.cookie = "stopwatches=[]; path=/"; // Clear stored stopwatches
			}
        }

        function saveStopwatches() {
			let stopwatches = [];
			document.querySelectorAll(".stopwatch").forEach(div => {
				stopwatches.push({
					name: div.querySelector(".stopwatch-title").value, // Fixed selector
					description: div.querySelector(".stopwatch-description").value, // Fixed selector
					time: parseTime(div.querySelector(".stopwatch-count").textContent), // Fixed selector
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

        function exportToTxt() {
			let stopwatches = [];
			document.querySelectorAll(".stopwatch").forEach(div => {
				stopwatches.push({
					name: div.querySelector(".stopwatch-title").value,
					description: div.querySelector(".stopwatch-description").value,
					time: div.querySelector(".stopwatch-count").textContent
				});
			});

			let content = stopwatches.map(sw => 
				`Name: ${sw.name}\nDescription: ${sw.description}\nTime: ${sw.time}\n\n`
			).join("");

			let blob = new Blob([content], { type: 'text/plain' });
			let url = URL.createObjectURL(blob);
			let a = document.createElement("a");
			a.href = url;
			a.download = "stopwatches.txt";
			a.click();
			URL.revokeObjectURL(url);
		}
    </script>
</head>
<body class="stopwatch-list">
    <h1>Multiple Stopwatches</h1>
    <button class="stopwatch-btn-group" onclick="addStopwatch()">Add Stopwatch</button>
    <button class="stopwatch-btn-group" onclick="exportToTxt()">Export to TXT</button>
    <button id="stopwatch-clearall" onclick="clearAllStopwatches()">Clear All</button>
    <div id="stopwatch-container"></div>
</body>
</html>
