<div class="span9">
    <h1>Create New Admin</h1>
    <form action="index.php?controller=admin&action=khachHangC" method="POST">
        <div class="form-group">
            <label for="customerName">Admin Name</label>
            <input type="text" id="customerName" name="tenkh" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" id="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="diachi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Admin</button>
    </form>
</div>