<div class="form-group">
    <label>Заголовок:</label>
    <input class="form-control mr-sm-2" name="title" type="text" placeholder="Введите заголовок поста..." required value="{{ $post['title'] ?? '' }}">            
</div>
<div class="form-group">
    <label>Содержание:</label>
    <textarea class="form-control mr-sm-2" rows="10" name="content" type="text" placeholder="Введите содержание поста..." required>{{ $post['content'] ?? ''}}</textarea>
</div>
<div class="form-group">
    <label>Изображение:</label>
    <input class="form-control-file mr-sm-2" name="img" type="file">
</div>