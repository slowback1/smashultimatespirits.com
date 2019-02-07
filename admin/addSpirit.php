<?php include './adminHeader.php' ?>
<style>
    body {
        background-color: #444;
        color: #eee;
    }
    fieldset {
        display: flex;
        flex-direction: column;
        width: 80%;
        margin: 10px auto;
    }
    @media only screen and (max-width: 800px) {
        fieldset {
            width: 100%;
            margin-left: 0;
            margin-right: 0;
        }
    }
    .description {
        padding-bottom: 100px;
    }
    input, textarea {
        margin-left: 2%;
        padding: 10px 5px;
        border-radius: 10px;
        width: 50%;
    }
</style>
<head>
    <title>Add Spirit | SSBUSD Admin Section </title>
</head>
<?php
    if($_GET['ecode'] === 'failure') {
        echo "<div class='message'><p>Something went wrong</p></div>";
    }
?>
    <form id="add_spirit" action="../actions/add_spirit.php" method="post" accept-charset="UTF-8">
        <fieldset>
            <label for="id">ID:</label><input type="number" placeholder="ID" name="id" id="id" required />
            <label for="name">Name:</label><input type="text" placeholder="Name" name="name" id="name" required />
            <label for="game">Origin Game:</label><input type="text" placeholder="Origin Game" name="game" id="game" required />
            <label for="series">Series:</label><select type="text" placeholder="Series" name="series" id="series">
            	<option value="">Series</option>
                <option value="Smash">Super Smash Brothers</option>
                <option value="Mario">Super Mario</option>
                <option value="DK">Donkey Kong</option>
                <option value="Zelda">The Legend of Zelda</option>
                <option value="Metroid">Metroid</option>
                <option value="Yoshi">Yoshi</option>
                <option value="Kirby">Kirby</option>
                <option value="StarFox">Star Fox</option>
                <option value="Pokemon">Pokemon</option>
                <option value="FZero">F-Zero</option>
                <option value="Mother">Earthbound/Mother</option>
                <option value="IceClimber">Ice Climber</option>
                <option value="FireEmblem">Fire Emblem</option>
                <option value="GameWatch">Game & Watch</option>
                <option value="AnimalCrossing">Animal Crossing</option>
                <option value="KidIcarus">Kid Icarus</option>
                <option value="Pikmin">Pikmin</option>
                <option value="Wario">Wario</option>
                <option value="ROB">R.O.B.</option>
                <option value="WiiFit">Wii Fit</option>
                <option value="PunchOut">Punch-Out!!</option>
                <option value="Xenoblade">Xenoblade</option>
                <option value="DuckHunt">Duck Hunt</option>
                <option value="Splatoon">Splatoon</option>
                <option value="MetalGear">Metal Gear</option>
                <option value="Sonic">Sonic The Hedgehog</option>
                <option value="MegaMan">Mega Man</option>
                <option value="PacMan">Pac-Man</option>
                <option value="StreetFighter">Street Fighter</option>
                <option value="FinalFantasy">Final Fantasy</option>
                <option value="Bayonetta">Bayonetta</option>
                <option value="Castlevania">Castlevania</option>
                <option value="Mii">Mii</option>
                <option value="Persona">Persona</option>
                <option value="Other">Other</option>
            </select>
            <label for="description">Description:</label><textarea type="text" placeholder="Description" name="description" id="description" class="description" required ></textarea>
            <label for="image">Image URL:</label><input type="text" placeholder="Image URL" name="image" id="image" required />
            <input type="submit" value="Add Spirit" />
        </fieldset>
    </form>
<?php include './adminFooter.php'?>