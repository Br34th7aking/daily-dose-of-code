<?php
  session_start();
  $_SESSION['files'] = "";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Zip Script Test</title>
  </head>
  <body>
    <table>
      <tr>
        <td><a href="/files/file1.pdf">File 1</a></td>
        <td><a href="/files/file2.pdf">File 2</a></td>
        <td><a href="/files/file3.pdf">File 3</a></td>
        <td><button class="download-button" onclick="">Download</button></td>
      </tr>
      <tr>
        <td><a href="/files/file4.pdf">File 4</a></td>
        <td><a href="/files/file5.pdf">File 5</a></td>
        <td>Not a file</td>
        <td><button class="download-button" onclick="">Download</button></td>
      </tr>
      <tr>
        <td><a href="files/file1.pdf">File 1</a></td>
        <td>Not a file</td>
        <td><a href="files/file2.pdf">File 2</a></td>
        <td><button class="download-button" onclick="">Download</button></td>
      </tr>
      <tr>
        <td>Not a file</td>
        <td><a href="files/file3.pdf">File 3</a></td>
        <td><a href="files/file4.pdf">File 4</a></td>
        <td><button class="download-button" onclick="">Download</button></td>
      </tr>
      <tr>
        <td><a href="files/file5.pdf">File 5</a></td>
        <td>Not a file</td>
        <td>Not a file</td>
        <td><button class="download-button" onclick="">Download</button></td>
      </tr>
      <tr>
        <td>Not a file</td>
        <td><a href="files/file1.pdf">File 1</a></td>
        <td>Not a file</td>
        <td><button class="download-button" onclick="">Download</button></td>
      </tr>
      <tr>
        <td>Not a file</td>
        <td>Not a file</td>
        <td><a href="files/file2.pdf">File 2</a></td>
        <td><button class="download-button" onclick="">Download</button></td>
      </tr>
      <tr>
        <td>Not a file</td>
        <td>Not a file</td>
        <td>Not a file</td>
        <td><button class="download-button" onclick="">Download</button></td>
      </tr>
    </table>

    <!--javascript code -->
    <script type="text/javascript">
      var downloadButtons = document.querySelectorAll('.download-button');
      for (let i = 0; i < downloadButtons.length; i++) {
        downloadButtons[i].addEventListener('click', function() {

          // get the td links for this row
          let td_links = [];
          let n = this.parentNode;
          while (n = n.previousElementSibling) {
            if (n.firstChild && n.firstChild.tagName == 'A') { // check if the tag is a link
              td_links.push(n.firstChild.href);
            }
          }
          let file_str = td_links.join(","); // each filename is separated by a ,

          window.open('download.php?files=' + file_str, '_blank');

        });
      }
    </script>
  </body>
</html>
