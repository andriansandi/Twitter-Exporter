<!DOCTYPE html>
<html>
    <head>
        <title>Twitt_Backup - Backup Your Twitt</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div id="content">
            <form method="post" action="">
                <label for="q">Search Value</label>
                <input type="text" name="q" value="<?php echo (isset($_POST['q'])) ? $_POST['q'] : ''; ?>">
                <input type="submit" name="backup" value="Backup">
            </form>
            <?php if($_POST): ?>
            <!-- results -->
            <div class="results">
                <table border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Username</th>
                            <th>Text</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $results = json_decode(file_get_contents('http://search.twitter.com/search.json?q='. $_POST['q']. '&rpp=100&include_entities=tru&result_type=mixed'));
                            //print_r($results);

                            foreach($results as $result){
                                //print_r($result[0])."<br>";
                                $i = 1;
                                foreach($result as $r){
                        ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $r->created_at; ?></td>
                                        <td><?php echo $r->from_user; ?></td>
                                        <td><?php echo $r->text; ?></td>
                                    </tr>  
                        <?php
                                }
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </body>
</html>