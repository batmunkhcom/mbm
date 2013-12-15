<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Using the proxy pattern in PHP</title>
<style type="text/css">
body {
    padding: 0;
    margin: 0;
    background: #fff;
    font: 0.8em Arial, Helvetica, sans-serif;
    color: #585858;
}
h1 {
    font-size: 3em;
    color: #0080ff;
}
h2 {
    font-size: 1.8em;
    color: #E87400;
    margin: 0 0 10px 0;
}
h3 {
    font-size: 1.2em;
    color: #585858;
    margin: 0 0 15px 0;
}
p {
    margin: 0 0 15px 0;
    line-height: 18px;
}
#wrapper {
    width: 800px;
    margin: 0 auto;
}
.entry {
    padding: 20px;
    margin: 40px 0 20px 0;
    background: #f8f8f8;
    border: 1px solid #ccc;
}
.comment {
    padding: 20px;
    margin: 0 0 20px 80px;
    background: #eee;
    border: 1px solid #ccc;
}
</style>
</head>
<body>
<div id="wrapper">
    <h1><?php echo $header;?></h1>
    <?php foreach ($entries as $entry):?>
        <div class="entry">
            <h2><?php echo $entry->title;?></h2>
            <h3>Posted by <?php echo $entry->author;?></h3>
            <p><?php echo $entry->content;?></p>
        </div>
        <?php foreach ($entry->comments as $comment):?>
           <div class="comment"> 
                <h3><?php echo $comment->author;?> said:</h3>
                <p><?php echo $comment->content;?></p>
            </div>
        <?php endforeach;?>
    <?php endforeach;?>
</div>
</body>
</html>