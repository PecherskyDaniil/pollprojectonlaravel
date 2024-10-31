 @extends('baselayout')
    @section('content')
        <div class="main-div">
            
        <table>
            <tr class='table-header'><td>Name</td> <td>Email</td> <td>Favorite animal</td> <td>Favorite food</td></tr>
        <?php
        $filepath='../storage/app/public/';
        $files = scandir($filepath);
        foreach($files as $file) {
            if($file == '.' || $file == '..' || $file == '.gitignore') continue;
            $data=json_decode(file_get_contents($filepath .$file),true);
            echo '<tr>';
            foreach($data as $cell){
                echo '<td>' . $cell . '</td>';
            }
            echo '</tr>';
        }
        ?>
        </table>
        </div>
        @endsection
