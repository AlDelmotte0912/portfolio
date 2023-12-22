<h3>habits tracker</h3>

<form action="index.php?page=view/habits" method="post">
    <table>
        <thead>
        <tr>
            <th>habits</th>
            <th>lun</th>
            <th>mar</th>
            <th>mer</th>
            <th>jeudi</th>
            <th>vdd</th>
            <th>samedi</th>
            <th>dimanche</th>
            <th>recap</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>réveil direct</td>
            <td><?php checkbox("rd", "rd_1"); ?></td>
            <td><?php checkbox("rd", "rd_2"); ?></td>
            <td><?php checkbox("rd", "rd_3"); ?></td>
            <td><?php checkbox("rd", "rd_4"); ?></td>
            <td><?php checkbox("rd", "rd_5"); ?></td>
            <td><?php checkbox("rd", "rd_6"); ?></td>
            <td><?php checkbox("rd", "rd_7"); ?></td>
            <td><?php checked_count("rd"); ?></td>
        </tr>
        <tr>
            <td>douche froide</td>
            <td><?php checkbox("df", "df_1"); ?></td>
            <td><?php checkbox("df", "df_2"); ?></td>
            <td><?php checkbox("df", "df_3"); ?></td>
            <td><?php checkbox("df", "df_4"); ?></td>
            <td><?php checkbox("df", "df_5"); ?></td>
            <td><?php checkbox("df", "df_6"); ?></td>
            <td><?php checkbox("df", "df_7"); ?></td>
            <td><?php checked_count("df"); ?></td>
        </tr>
        <tr>
            <td>lire</td>
            <td><?php checkbox("l", "l_1"); ?></td>
            <td><?php checkbox("l", "l_2"); ?></td>
            <td><?php checkbox("l", "l_3"); ?></td>
            <td><?php checkbox("l", "l_4"); ?></td>
            <td><?php checkbox("l", "l_5"); ?></td>
            <td><?php checkbox("l", "l_6"); ?></td>
            <td><?php checkbox("l", "l_7"); ?></td>
            <td><?php checked_count("l"); ?></td>
        </tr>
        <tr>
            <td>méditation</td>
            <td><?php checkbox("m", "m_1"); ?></td>
            <td><?php checkbox("m", "m_2"); ?></td>
            <td><?php checkbox("m", "m_3"); ?></td>
            <td><?php checkbox("m", "m_4"); ?></td>
            <td><?php checkbox("m", "m_5"); ?></td>
            <td><?php checkbox("m", "m_6"); ?></td>
            <td><?php checkbox("m", "m_7"); ?></td>
            <td><?php checked_count("m"); ?></td>
        </tr>
        <tr>
            <td>sport</td>
            <td><?php checkbox("s", "s_1"); ?></td>
            <td><?php checkbox("s", "s_2"); ?></td>
            <td><?php checkbox("s", "s_3"); ?></td>
            <td><?php checkbox("s", "s_4"); ?></td>
            <td><?php checkbox("s", "s_5"); ?></td>
            <td><?php checkbox("s", "s_6"); ?></td>
            <td><?php checkbox("s", "s_7"); ?></td>
            <td><?php checked_count("s"); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit"></td>
            <td><input type="submit"></td>
            <td><input type="submit"></td>
            <td><input type="submit"></td>
            <td><input type="submit"></td>
            <td><input type="submit"></td>
            <td><input type="submit"></td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <?php
    echo '<hr>';

    echo ' trouver comment faire pour afficher l icone a la place du vieux truc bleu de base;'

    ?>
</form>
</body>
</html>

