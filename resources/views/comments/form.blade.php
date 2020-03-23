<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Добавить комментарий</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div>

        <input type="text" placeholder="Ваше имя" class="form-control mb-3" name="username">

        <input type="email" placeholder="Ваше email" class="form-control  mb-3" name="useremail">

        <input type="text" placeholder="Заголовок" class="form-control  mb-3" name="title">

        <input type="text" placeholder="Комментарий" class="form-control" name="text">

    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="send_comment" data-url="{{route('test.addcomment') }}">Отправить</button>
</div>