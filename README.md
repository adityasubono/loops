8.Jelaskan secara singkat (2 - 3 paragraf) arsitektur, prinsip, pendekatan, atau hal lainnya yang digunakan dalam pengembangan aplikasi ini.

Arsitektur aplikasi ini menggunakan MVC yaitu Model, View, Controller, Model adalah class yang menjadi jembatan penghubung antara database dan aplikasi, di class Model juga terdapat relasi yang terdapat di setiap tabel , selain itu juga tempat pengolahan data, View adalah yang menampilkan hasil kepada pengguna dari pemrosesan data di Model dan logic di Controller, di View diatur styling dan layout dari aplikasi, Controller adalah pusat logic aplikasi yang melakukan proses data sebelum ditampilkan di View, yaitu menangani pengerjaan proses bisnis aplikasi.
Arsitektur MVC bertujuan untuk memenuhi single responsibility principle (SRP), yaitu prinsip pemisahan komponen berdasarkan tugasnya masing-masing. Dengan mengadopsi pola pengembangan MVC, Laravel dapat membagi ketiga tugas yang ada pada aplikasi kita.
Pendekatan dalam pembuatan aplikasi ini adalah DRY, yaitu Don’t Repeat Yourself, tidak mengulang code di beberapa tempat. Design Pattern aplikasi ini memungkinkan untuk melakukan perubahan di satu tempat tanpa harus mengubah banyak hal di beberapa tempat lain.

9.Apa kekurangan dari aplikasi yang dibangun ini dalam beberapa aspek berikut :
a. Fitur
b. Performa
c. Kualitas Kode

a. Fitur search belum ada, fitur untuk mencari artikel yang ada dalam aplikasi, fitur validasi juga belum ada ,serta upload gambar Image thumbnail untuk artikel belum ada.
b. Performa aplikasi belum optimal karena tidak menggunakan fitur caching untuk menyimpan data Login User, di aplikasi ini juga masih banyak library yang tidak terpakai dan juga tidak optimal dalam menggunakan code logic sendiri sehingga harus menggunakan library.
c. Kualitas Code belum optimal mengingat ada beberapa bagian code yang belum memakai fitur dasar dari Laravel seperti login di AuthenticatesUsers, code juga masih memiliki class yang bertindak sebagai GodClass yaitu class yang memiliki berbagai macam fungsi.
