# Bài tập: Xây dựng Form Đăng Nhập bằng PHP và MySQL

## Thông tin sinh viên
* **Họ và tên:** Nguyễn Trọng Đại
* **Mã sinh viên:** 23810310120
* **Trường:** Đại học Điện lực (EPU)

## Mô tả dự án
Dự án này là một hệ thống xác thực người dùng cơ bản được viết bằng PHP thuần và cơ sở dữ liệu MySQL, đáp ứng đầy đủ các yêu cầu về chức năng đăng ký, đăng nhập và bảo mật cơ bản.

## Nội dung thực hiện
1. **Thiết kế Cơ sở dữ liệu:**
   * Tạo database `login_system` và bảng `users` với các trường: `id` (Primary Key, Auto Increment), `username` (Unique), và `password`.
2. **Chức năng Đăng ký (`register.php`):**
   * Cho phép người dùng tạo tài khoản mới.
   * Xử lý kiểm tra trùng lặp tên đăng nhập (username).
   * **Bảo mật:** Sử dụng hàm `password_hash()` của PHP (thuật toán BCRYPT) để băm mật khẩu trước khi lưu trữ vào cơ sở dữ liệu.
3. **Chức năng Đăng nhập (`login.php`):**
   * Form HTML nhận dữ liệu và gửi đi qua phương thức `POST`.
   * Truy vấn cơ sở dữ liệu để tìm kiếm người dùng.
   * **Xác thực:** Sử dụng hàm `password_verify()` để đối chiếu mật khẩu nhập vào với mã băm trong cơ sở dữ liệu.
   * Khởi tạo Session (`$_SESSION`) để lưu trữ trạng thái đăng nhập thành công.
4. **Kiểm soát truy cập & Điều hướng:**
   * Trang `welcome.php` (Trang chức năng chính) được bảo vệ bằng cách kiểm tra Session. Nếu người dùng chưa đăng nhập sẽ tự động bị chuyển hướng (redirect) về trang login.
   * Cung cấp thông báo trực quan ("Đăng nhập thành công!", "Đăng nhập thất bại!", "Tên người dùng đã tồn tại!").
5. **Giao diện (UI/UX):**
   * Tích hợp file `style.css` để định dạng form đăng nhập/đăng ký căn giữa màn hình, phân chia các khối input rõ ràng và hiển thị màu sắc thông báo phù hợp.

## Hướng dẫn chạy chương trình
1. Clone repository này về máy tính và đặt trong thư mục `htdocs` của XAMPP:
   ```bash
   git clone https://github.com/nguyendaj36/th0204.git