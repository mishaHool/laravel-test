extends('layout.main')
<form action="upd" method="post">
@csrf
<input type="title" name='title' id='tt' placeholder='text'>
<input type="text" name='text' placeholder='text'>
<input type="text" name='title_name' id='ttl' placeholder='repeat title please'>
<input type="submit" value="submit">
</form>