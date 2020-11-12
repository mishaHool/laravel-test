@extends('layout.main')
<form action="rec" method="post">
@csrf
<input type="title" name='title' id='tt' placeholder='title'>
<input type="text" name='text' id='txt' id placeholder='text'>
<input type="submit" value="submit">
</form>
<form action="upd" method="post">
@csrf
<input type="text" name="id" placeholder='id'>
<input type="title" name='title' id='tt' placeholder='new title'>
<input type="text" name='text' placeholder='new text'>
<input type="submit" value="update">
</form>
<form action="show" method="get">
<input type="submit" value='show articles'>
</form>
@if(isset($articles))
    <table>
    <tr>
    <td>Title</td>
    <td>Text</td>
    <td>ID</td>
    </tr>
    @foreach($articles as $article)
        <tr>
        <td>{{$article['id']}}</td>
        <td>{{$article['title']}}</td>
        <td>{{$article['text']}}</td>
        <td>        
            <form action="dele" method="post">
            @csrf
                <input type="text" name="id" hidden value="{{$article['id']}}">
                <input type="submit" value="delete"> 
            </form>
        </td>
        <td>        
            <form action="upd" method="post">
                @csrf
                <input type="submit" class='upd' value="update"> 
                <input type="text" name='text'>
                <input type="text" name='title'>
                <input type="text" name='id' hidden>
            </form>
        </td>

        </tr>
    @endforeach
    </table>
@endif
<br>
<script>
console.log('java')
let e = document.getElementsByClassName('upd')
for(i=0;i<e.length;i++){
    e[i].addEventListener('click', function(){
        let num = this.parentElement.parentElement.parentElement.firstChild.nextSibling.innerText;
        console.log(num);
        var formData = [num];
        let id = this.nextElementSibling.nextElementSibling.nextElementSibling;
        id.value = formData
    })
}
</script>