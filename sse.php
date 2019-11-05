<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Getting server updates</h1>
<div id="result"></div>

<script>
if(typeof(EventSource) !== "undefined") {
  var source = new EventSource("sseex.php");
  source.onmessage = function(event) {
    document.getElementById("result").innerHTML = event.data + "<br>";
  };
} else {
  document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
}
</script>
</body>
</html>