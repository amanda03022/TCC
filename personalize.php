<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="personalizestyle.css">
    
    <title>Paint</title>
</head>
<body>

    <section class="container">

<!--teste-->        <canvas id="myCanvas" width="900" height="600"></canvas>

        <div>
            <section class="tool-box">
                <button class="button__tool active" data-action="brush">
                    <span class="material-symbols-outlined">brush</span>
                </button>

                <button class="button__tool" data-action="rubber">
                    <span class="material-symbols-outlined">ink_eraser</span>
                </button>

                <button class="button__tool" data-action="text">
                    <span class="material-symbols-outlined">title</span>
                </button>

                <button class="button__tool">
                    <input type="color" class="input__color">
                </button>
            </section>

            <section class="tool-box">
                <button class="button__size" data-size=5>
                    <span class="stroke"></span>
                </button>

                <button class="button__size" data-size=10>
                    <span class="stroke"></span>
                </button>

                <button class="button__size active" data-size=20>
                    <span class="stroke"></span>
                </button>

                <button class="button__size" data-size=30>
                    <span class="stroke"></span>
                </button>
            </section>
            
            <section class="tool-box">
                <button class="button__tool button__clear">
                    <span class="material-symbols-outlined">delete</span>
                </button>
            </section>
        </div>

    </section>
    <script>
        const canvas = document.getElementById("myCanvas");
        const ctx = canvas.getContext("2d");

        const inputColor = document.querySelector(".input__color");
        const tools = document.querySelectorAll(".button__tool");
        const sizeButtons = document.querySelectorAll(".button__size");
        const buttonClear = document.querySelector(".button__clear");

        let brushSize = 20;
        let isPainting = false;
        let activeTool = "brush";
        let lastX, lastY;

        inputColor.addEventListener("change", ({ target }) => {
            ctx.fillStyle = target.value;
        });

        canvas.addEventListener("mousedown", ({ clientX, clientY }) => {
            isPainting = true;

            if (activeTool === "brush" || activeTool === "text") {
                draw(clientX, clientY);
            }

            if (activeTool === "rubber") {
                erase(clientX, clientY);
            }
        });

        canvas.addEventListener("mousemove", ({ clientX, clientY }) => {
            if (isPainting) {
                if (activeTool === "brush" || activeTool === "text") {
                    draw(clientX, clientY);
                }

                if (activeTool === "rubber") {
                    erase(clientX, clientY);
                }
            }
        });

        canvas.addEventListener("mouseup", () => {
            isPainting = false;
            lastX = undefined;
            lastY = undefined;
        });

        const draw = (x, y) => {
            ctx.globalCompositeOperation = "source-over";
            ctx.lineWidth = brushSize;
            ctx.lineCap = "round";
            ctx.strokeStyle = ctx.fillStyle;

            if (activeTool === "text") {
                const text = prompt("Enter text:");
                if (text) {
                    ctx.font = `${brushSize}px Arial`;
                    ctx.fillText(text, x - canvas.offsetLeft, y - canvas.offsetTop);
                }
            } else {
                if (!lastX || !lastY) {
                    ctx.beginPath();
                    ctx.moveTo(x - canvas.offsetLeft, y - canvas.offsetTop);
                } else {
                    ctx.lineTo(x - canvas.offsetLeft, y - canvas.offsetTop);
                    ctx.stroke();
                }
            }

            lastX = x - canvas.offsetLeft;
            lastY = y - canvas.offsetTop;
        };

        const erase = (x, y) => {
            ctx.globalCompositeOperation = "destination-out";
            ctx.lineWidth = brushSize;
            ctx.lineCap = "round";

            if (!lastX || !lastY) {
                ctx.beginPath();
                ctx.moveTo(x - canvas.offsetLeft, y - canvas.offsetTop);
            } else {
                ctx.lineTo(x - canvas.offsetLeft, y - canvas.offsetTop);
                ctx.stroke();
            }

            lastX = x - canvas.offsetLeft;
            lastY = y - canvas.offsetTop;
        };

        const selectTool = ({ target }) => {
            const selectedTool = target.closest("button");
            const action = selectedTool.getAttribute("data-action");

            if (action) {
                tools.forEach((tool) => tool.classList.remove("active"));
                selectedTool.classList.add("active");
                activeTool = action;
            }
        };

        const selectSize = ({ target }) => {
            const selectedTool = target.closest("button");
            const size = selectedTool.getAttribute("data-size");

            sizeButtons.forEach((tool) => tool.classList.remove("active"));
            selectedTool.classList.add("active");
            brushSize = size;
        };

        tools.forEach((tool) => {
            tool.addEventListener("click", selectTool);
        });

        sizeButtons.forEach((button) => {
            button.addEventListener("click", selectSize);
        });

        buttonClear.addEventListener("click", () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        });
    </script>
    <script src="./script.js"></script>
</body>
</html>
