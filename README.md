# Kết nối xServer

-   Tạo ssh key để kết nối

```sh
ssh-keygen -t rsa
```

-   Thêm khóa ssh công khai vào xServer

# Thay đổi phiên bản PHP

-   Kết nối vào server để cấu hình phiên bản PHP mới nhất theo các lệnh sau

```bash
# Vào thư mục chính của tài khoản
cd $HOME

# Tạo 1 thư mục tên là bin
mkdir bin

# link thư mục $HOME/bin/php vào thư mục php8.2
ln -s /usr/bin/php8.2 $HOME/bin/php
ls -la $HOME/bin/

# Tạo file profile
vi .bash_profile
```

Cập nhật nội dung .bash_profile như sau

```bash
#PATH=$PATH:$HOME/bin
PATH=$HOME/bin:$PATH
```

áp dụng file bash

```sh
source .bash_profile
```

# Up mã nguồn

-   clone source vào thư cùng cấp với thư mục public_html (ví dụ laravel)
-   backup thư mục public_html website

```sh
mv /home/[xserver_account]/[domain]/public_html /home/[xserver_account]/[domain]/_public_html
```

-   link thư mục public_html qua thư mục public của laravel

```sh
 ln -s /home/[xserver_account]/[laravel]/public /home/[xserver_account]/[domain]/public_html
```
