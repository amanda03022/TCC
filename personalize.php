[11:14, 12/12/2023] Duda Marioza :
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIQUE Personalize</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.2/fabric.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https:…
[11:24, 12/12/2023] Duda Marioza : [11:21, 12/12/2023] Maria Eduarda: AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
[11:21, 12/12/2023] Maria Eduarda: BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB
[11:21, 12/12/2023] Maria Eduarda: CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC…
[11:37, 12/12/2023] Duda Marioza : <!DOCTYPE html>
<html lang=" pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UNIQUE Personalize</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.2/fabric.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Herr+Von+Muellerhoff&display=swap" rel="stylesheet">
        <style>
            body {
                display: flex;
                margin: 0;
                font-family: 'Arial', sans-serif;
            }

            #canvas-container {
                flex: 1;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                padding: 20px;
            }

            #canvas {
                border: 1px solid black;
            }

            #toolbox {
                box-sizing: border-box;
                background-color: #f0f0f0;
                padding: 60px;
                border-radius: 10px;
                margin-left: 40px;
                margin-top: 60px;

            }

            label {
                display: block;
                margin-bottom: 8px;
            }

            input[type="color"],
            input[type="text"],
            select,
            input[type="range"] {
                width: 100%;
                padding: 8px;
                margin-bottom: 16px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 8px;
            }

            .color-picker {
                width: 100%;
                padding: 8px;
                margin-bottom: 16px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 50%;
            }

            button {
                border-radius: 50%;
                padding: 10px;
                margin: 5px;
                cursor: pointer;
                border: none;
                background-color: #ccc;
                font-size: 16px;
            }

            button.drawing-mode {
                background-color: #e74c3c;
                /*  Cor do botão mudando para vermelho */
                color: white;
            }

            button i {
                font-size: 24px;
            }

            .editable {
                cursor: text;
            }

            .delete-button {
                position: absolute;
                top: 0;
                left: 0;
                cursor: pointer;
                font-size: 16px;
                color: red;
                background-color: white;
                border: none;
                padding: 5px;
                margin: 5px;
                z-index: 1;
            }
        </style>
    </head>

<body>
    <?php
    include_once("menu.php");
    ?>

    <div id="canvas-container">
        <canvas id="canvas" width="300" height="450"></canvas>

        <div id="toolbox">
            <label for="text">Texto:</label>
            <input type="text" id="text" name="text" placeholder="Digite seu texto" onkeydown="handleKey(event)">

            <label for="color">Cor:</label>
            <input type="color" id="color" name="color" value="#ff0000" oninput="updateTextColor()">

            <label for="font">Fonte:</label>
            <select id="font" name="font" onchange="updateTextFont()">
                <option value="Arial">Arial</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Caveat">Caveat</option>
                <option value="Dancing Script">Dancing Script</option>
                <option value="Herr Von Muellerhoff">Herr Von Muellerhoff</option>
            </select>



            <button id="brushButton" onclick="toggleDrawingMode()">
                <i class="fas fa-paint-brush"></i>
            </button>

            <label for="brushSize">Tamanho do Pincel:</label>
            <input type="range" id="brushSize" name="brushSize" min="1" max="50" value="5">

            <label for="brushColor">Cor do Pincel:</label>
            <input type="color" id="brushColor" name="brushColor" value="#000000">

            <button onclick="deleteSelected()">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </div>
    <script>
        const canvas = new fabric.Canvas('canvas');
        let drawingMode = false;

        fabric.Image.fromURL('canecaa.webp', function (img) {
            img.scaleToWidth(canvas.width);
            canvas.add(img);
            img.set({ selectable: false });
        });

        document.addEventListener('keydown', function (event) {
            handleKey(event);
        });

        canvas.on('mouse:dblclick', function (options) {
            const target = options.target;
            if (target && target.type === 'i-text') {
                editText(target);
            }
        });

        function handleKey(event) {
            if (event.key === 'Enter') {
                // Verificar se há texto antes de chamar addText
                const textValue = document.getElementById('text').value.trim();
                if (textValue !== '') {
                    addText();
                }
            } else if (event.key === 'Delete' || event.key === 'Backspace') {
                deleteSelected();
            }
        }

        function toggleDrawingMode() {
            drawingMode = !drawingMode;
            canvas.isDrawingMode = drawingMode;
            canvas.selection = !drawingMode;

            const brushButton = document.getElementById('brushButton');
            if (drawingMode) {
                brushButton.classList.add('drawing-mode');
            } else {
                brushButton.classList.remove('drawing-mode');
            }
        }

        function updateBrushSize() {
            const brushSize = document.getElementById('brushSize').value;
            canvas.freeDrawingBrush.width = parseInt(brushSize, 10);
        }

        function updateBrushColor() {
            const brushColor = document.getElementById('brushColor').value;
            canvas.freeDrawingBrush.color = brushColor;
        }

        function addText() {
            const color = document.getElementById('color').value;
            const textValue = document.getElementById('text').value;
            const font = document.getElementById('font').value;

            const newText = new fabric.IText(textValue, {
                fontSize: 24,
                left: 50,
                top: 50,
                fill: color,
                fontFamily: font,
                selectable: true,
                editable: true,
                class: 'editable', // Adicionando a classe para indicar que é editável
            });

            canvas.add(newText);
            canvas.setActiveObject(newText);
            clearTextInputs();
        }

        function editText(textObject) {
            const selectionStart = textObject.getSelectionStart();
            const selectionEnd = textObject.getSelectionEnd();

            if (selectionStart === selectionEnd) {
                // Se a seleção estiver vazia, deleta a letra anterior
                textObject.setSelectionStart(selectionStart - 1);
            }

            textObject.enterEditing(); // Inicia o modo de edição
        }

        function updateTextColor() {
            const color = document.getElementById('color').value;
            const activeObject = canvas.getActiveObject();
            if (activeObject && activeObject.type === 'i-text') {
                activeObject.set('fill', color);
                canvas.renderAll();
            }
        }

        function updateTextFont() {
            const font = document.getElementById('font').value;
            const activeObject = canvas.getActiveObject();
            if (activeObject && activeObject.type === 'i-text') {
                activeObject.set('fontFamily', font);
                canvas.renderAll();
            }
        }

        function deleteSelected() {
            const activeObject = canvas.getActiveObject();
            if (activeObject) {
                if (activeObject.type === 'i-text' && activeObject.isEditing) {
                    // Se estiver editando texto, deleta a seleção dentro do texto
                    const selectionStart = activeObject.getSelectionStart();
                    const selectionEnd = activeObject.getSelectionEnd();
                    activeObject.removeChars(selectionStart, selectionEnd - selectionStart);
                } else {
                    // Deleta o objeto selecionado
                    canvas.remove(activeObject);
                }
            }
        }

        function clearTextInputs() {
            document.getElementById('text').value = '';
            document.getElementById('color').value = '#000000';
            document.getElementById('font').value = 'Arial';
        }

        document.getElementById('brushSize').addEventListener('input', function () {
            updateBrushSize();
        });
<!---->
        document.getElementById('brushColor').addEventListener('input', function () {
            updateBrushColor();
        });
    </script>
</body>

</html>