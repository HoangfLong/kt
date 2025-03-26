<form method="POST" action="/bomb">
    <div>
        <input type="text" name="userName" placeholder="Nhap de">
        <input type="hidden" name="_method" value="DELETE"/>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    </div>
    <button type="submit">submit</button>
</form>