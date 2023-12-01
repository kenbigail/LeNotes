<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>LeNotes | Save your Thoughts</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Nested CSS -->
    <style>
        html {
            overflow-x: hidden;
        }

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        header {
            width: 100vw;
            height: 10vh;
            padding-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container-header {
            width: 80vw;
            height: 9.5vh;
            padding-top: 1.5vh;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .title {
            font-size: 2.5em;
            font-weight: 500;
        }

        .emote {
            font-size: 0.8em;
        }

        .btn-add {
            width: 50px;
            height: 50px;
            margin-top: 5px;
            border-radius: 80%;
            background: #FEC871;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-add:hover {
            scale: 105%;
            transition: 0.3s;
            cursor: pointer;
        }

        .plus {
            width: 25px;
        }

        .stripe {
            height: 0.5vh;
            width: 80vw;
            background: #2B2B2B;
        }

        .notes-add {
            visibility: hidden;
            scale: 90%;
            transition: 0.1s;
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: fixed;

            background: #00000086;
        }

        .notes-add.active {
            visibility: visible;
            scale: 100%;
            transition: 0.1s;
        }

        .notes {
            width: 550px;
            height: 60%;
            background: #FD9A71;
            border-radius: 22px;
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .notes-fill {
            width: 100%;
            height: 75%;
            margin-top: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .in-fill {
            width: 90%;
            height: 100%;
            font-weight: 400;
            font-size: 3em;
            outline: none;
            border: none;
            background: none;
            color: #000000;
        }

        .in-fill::placeholder {
            color: #1c1c1d;
        }

        .create {
            width: 100%;
            height: 15%;
            display: flex;
            justify-content: end;
            align-items: center;
        }

        .btn-create {
            width: 50px;
            height: 50px;
            border-radius: 80%;
            margin-right: 3%;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: 0.2s;
            border: none;
        }

        .btn-create:hover {
            scale: 105%;
            transition: 0.2s;
        }

        .btn-create img {
            width: 25px;
        }

        .back {
            margin-top: 25px;
            width: 50px;
            height: 50px;
            border-radius: 80%;

            display: flex;
            justify-content: center;
            align-items: center;

            background: #F96D60;
            transition: 0.2s;

            cursor: pointer;
        }

        .back:hover {
            scale: 105%;
            transition: 0.2s;
        }

        .back img {
            width: 25px;
        }

        section {
            width: 100vw;
            height: auto;
            display: flex;
            justify-content: center;

            margin-top: 25px;
        }

        .container-notes {
            width: 80vw;
            padding-bottom: 35px;
            display: grid;
            grid-template-columns: 33% 33% 33%;
            column-gap: 30px;
            row-gap: 50px;
        }

        .pr-notes {
            width: 90%;
            height: 35vh;
            border-radius: 22px;
            background: #FD9A71;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .notes-text {
            width: 80%;
            height: 75%;
            display: flex;
        }

        .notes-p {
            font-size: 1.3em;
            font-weight: 500;
        }

        .delete-area {
            width: 100%;
            height: 10%;
            display: flex;
            justify-content: end;
            align-items: center;
        }

        .btn-delete {
            width: 50px;
            height: 50px;
            border-radius: 80%;
            margin-right: 3%;
            background: #FFF3F3;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: 0.2s;
            border: none;
        }

        .btn-delete:hover {
            scale: 105%;
            transition: 0.2s;
        }

        .img-delete {
            width: 25px;
        }

        @media screen and (max-width:1389px) {
            .container-notes {
                column-gap: 25px;
            }
        }

        @media screen and (max-width:1200px) {
            .notes-p {
                font-size: 1.2em;
            }
        }

        @media screen and (max-width:1100px) {
            .container-notes {
                column-gap: 20px;
            }

            .notes-p {
                font-size: 1.1em;
            }
        }

        @media screen and (max-width:960px) {
            .container-notes {
                column-gap: 20px;
            }

            .notes-p {
                font-size: 1.05em;
            }
        }

        @media screen and (max-width:860px) {
            .container-notes {
                grid-template-columns: 50% 50%;
                column-gap: 30px;
            }
        }

        @media screen and (max-width:590px) {
            .container-notes {
                grid-template-columns: 100%;
                row-gap: 30px;
            }

            .notes {
                width: 100%;
                height: 60%;
            }

            .pr-notes {
                width: 100%;
            }

            .notes-p {
                font-size: 1.4em;
            }
        }

        @media screen and (max-width:499px) {

            .notes-p {
                font-size: 1.3em;
            }
        }
    </style>
</head>

<body>
    <!-- Add Notes -->
    <div class="notes-add" id="notesAdd">
        <div class="notes">
            <div class="notes-fill">
                <textarea class="in-fill" id="inFill" placeholder="What's Up today?"></textarea>
            </div>
            <div class="create">
                <button class="btn-create" onclick="addNotes()"><img src="add.png" alt="add"></button>
            </div>
        </div>

        <div class="back" id="back"><img src="x.png" alt="x"></div>
    </div>

    <!-- Header of Website -->
    <header>
        <div class="container-header">
            <p class="title">LeNotes</p>
            <div class="btn-add" id="btnAdd"><img class="plus" src="plus.png" alt="plus"></div>
        </div>

        <div class="stripe"></div>
    </header>

    <!-- Section of Notes -->
    <section>
        <div class="container-notes" id="containerNotes">
            <!-- The notes will be appended in JavaScript -->
        </div>
    </section>

    <!-- Nested Javascript -->
    <script>
        // the Button Add Shows the Notes Input when you press it
        // take the ID from each elements of Add and Back
        const btnAdd = document.getElementById("btnAdd");
        const btnBack = document.getElementById("back");
        const btnCreate = document.getElementById("btn-create")

        // btnAdd click event
        btnAdd.addEventListener("click", () => {
            // will toggle the class 'active'
            const notesAdd = document.getElementById("notesAdd");
            notesAdd.classList.toggle('active');
        });

        // back click event
        back.addEventListener("click", () => {
            // will remove the class 'active'
            const notesAdd = document.getElementById("notesAdd");
            notesAdd.classList.remove('active');
        });

        // loaded content event
        document.addEventListener("DOMContentLoaded", () => {
            // start the function displayNotes()
            displayNotes();
        });

        // make the function displayNotes()
        function displayNotes() {
            // get the container ID and make it empty
            const notesPr = document.getElementById("containerNotes");
            notesPr.innerHTML = '';

            // variable of the JSON data (from notes.php)
            const notesDt = 'notes.php';

            // fetch the API
            fetch(notesDt)
                .then(response => response.json())
                .then(data => {
                    // make the contents by creating the elements and classlist
                    data.forEach(notes => {
                        const cardNt = document.createElement('div');
                        const conTxt = document.createElement('div');
                        const arDel = document.createElement('div');
                        cardNt.classList.add('pr-notes');
                        conTxt.classList.add('notes-text');
                        arDel.classList.add('delete-area');

                        const noteTxt = document.createElement('p');
                        noteTxt.classList.add('notes-p');
                        noteTxt.textContent = notes.note_fill;

                        const btnDel = document.createElement('button');
                        btnDel.classList.add('btn-delete');
                        // btnDel click event
                        btnDel.addEventListener("click", () => {
                            // will delete the Notes after making the deleteNotes() Function
                            deleteNotes(notes.id)
                        });

                        const imgDel = document.createElement('img');
                        imgDel.classList.add('img-delete');
                        imgDel.src = 'trash.png';

                        // now append the contents
                        notesPr.appendChild(cardNt);
                        cardNt.appendChild(conTxt);
                        cardNt.appendChild(arDel);
                        conTxt.appendChild(noteTxt);
                        arDel.appendChild(btnDel);
                        btnDel.appendChild(imgDel);
                    });
                    // check if the Data pops up on the console
                    console.log(data);
                });
        };

        // Function used to add Notes Data
        function addNotes() {
            // take the ID of the Input and the value
            const notesInput = document.getElementById('inFill');
            const notes = notesInput.value.trim();

            // method post so it will be sended to the PHP databases
            if (notes !== '') {
                fetch('notes.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            notes
                        }),
                    })
                    .then(() => {
                        // delete the display value when it's sended
                        notesInput.value = '';
                        // display the notes
                        displayNotes();
                    });
            }
        }

        // function to delete the notes
        function deleteNotes(id) {
            // identify the PHP Databases ID
            fetch(`notes.php?id=${id}`, {
                // method delete so it will be deleted from the PHP Databases
                    method: 'DELETE',
                })
                // update the displayNotes()
                .then(() => displayNotes());
        }
    </script>
</body>

</html>