<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Extraction</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
i {
  border: 1px solid #aaa;
  border-radius: 8px;
  margin: 4px;
  padding: 8px;
  cursor: pointer;
}
</style>
</head>
<body>
<div></div>
<textarea style="width: 100%; height: 400px"></textarea><br>
<button>Class!</button>
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script>
var icons = [
  <?php
    $html = file_get_contents('http://fontawesome.io/icons/');
    preg_match_all('/<div class="fa-hover col-md-3 col-sm-4">.+?<i class="fa (.+?)"(?!.+?\(alias\)).+?<\/div>/', $html, $m);
    $rows = array_unique($m[1]);
    foreach ($m[1] as $c) echo "'$c',";
  ?>
];
icons.forEach(function(icon) {
  $('div').append('<i class="fa fa-lg ' + icon + '" data-icon="' + icon + '"></i>');
});
$('button').click(function() {
  var text = '';
  $('i').each(function(i, elem) {
    text += "'" + $(elem).data('icon') + "', ";
  });
  $('textarea').text(text);
});
$('i').click(function() {
  $(this).remove();
});
</script>
</body>
</html>