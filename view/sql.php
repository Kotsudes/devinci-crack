<table>
    <thead><tr>
    
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Profession</th>
    </tr></thead>
    <tbody>
    <?php
        foreach($users as $person){
        echo "<tr>";
        echo "<td>".$person->getId()."</td>";
        echo "<td>".$person->getFirstName()."</td>";
        echo "<td>".$person->getLastName()."</td>";
        echo "<td>".$person->getProfession()."</td>";
        echo "</tr></br>";
        }
        ?>
    </tbody>
</table>