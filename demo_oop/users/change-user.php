<?php
require_once 'User.php';
require_once '../utils.php';
// hiển thị danh sách user trong db
$id = $_GET['id'];
$users = new User();
$users->update($id);
$roles = [
    ['id' => 0, 'name' => 'Member'],
    ['id' => 200, 'name' => 'Admin'],
    ['id' => 900, 'name' => 'Super Admin'],
];
?>
<?php foreach ($users as $u) : ?>
    <form action="save-change.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Name</label>
            <input type="text" name="name" value="<?= $u->name ?>">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <label for="">Avatar</label>
            <input type="file" name="file">
        </div>
        <div>
            <label for="">Role</label>
            <select name="role">
                <?php foreach ($roles as $r) : ?>
                    <option value="<?= $r['id'] ?>"><?= $r['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <button type="submit">Tạo mới</button>
        </div>
    </form>
<?php endforeach ?>