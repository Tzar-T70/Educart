# Educart

<img src="/public/images/Logo_transparent.png" alt="Educart Logo">
A student-focused e-commerce site made using the Laravel framework as part of the CS2TP module at Aston University.

![](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)
![](https://img.shields.io/badge/Trello-0052CC?style=for-the-badge&logo=trello&logoColor=white)
![Static Badge](https://img.shields.io/badge/Made_With-VS_Code-blue)

## Run Locally

Download XAMPP (for running the database in SQL):

     https://www.apachefriends.org/download.html?xampp-win32-1.6.6a-installer.exe

Clone the project: 

```bash
  git clone https://github.com/Tzar-T70/Educart
```

Change database values to your liking (if you dont use MySQL):

```.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=educart
DB_USERNAME=root
DB_PASSWORD=
```

Navigate to the project directory in a terminal:

```bash
  cd Educart
```

Run Migrations (creates database tables):

```bash
  php artisan migrate
```
Run Seeder (if you want test data):

```bash
    php artisan db:seed
```


Start the server:

```bash
  php artisan serve
```

Visit http://localhost:8000




## Contributors

<table>
    <tr>
        <td align="center" style="word-wrap: break-word; width: 150.0; height: 150.0">
            <a href=https://github.com/Tzar-T70>
                <img src=https://avatars.githubusercontent.com/u/183425033?v=4 width="100;"  style="border-radius:50%;align-items:center;justify-content:center;overflow:hidden;padding-top:10px" alt=Tzar-T70/>
                <br />
                <sub style="font-size:14px"><b>Tzar-T70</b></sub>
            </a>
        </td>
        <td align="center" style="word-wrap: break-word; width: 150.0; height: 150.0">
            <a href=https://github.com/sSubZzz>
                <img src=https://avatars.githubusercontent.com/u/185355109?v=4 width="100;"  style="border-radius:50%;align-items:center;justify-content:center;overflow:hidden;padding-top:10px" alt=sSubZzz/>
                <br />
                <sub style="font-size:14px"><b>sSubZzz</b></sub>
            </a>
        </td>
        <td align="center" style="word-wrap: break-word; width: 150.0; height: 150.0">
            <a href=https://github.com/slmaoo>
                <img src=https://avatars.githubusercontent.com/u/137297735?v=4 width="100;"  style="border-radius:50%;align-items:center;justify-content:center;overflow:hidden;padding-top:10px" alt=slmaoo/>
                <br />
                <sub style="font-size:14px"><b>slmaoo</b></sub>
            </a>
        </td>
        <td align="center" style="word-wrap: break-word; width: 150.0; height: 150.0">
            <a href=https://github.com/Ifrahd2>
                <img src=https://avatars.githubusercontent.com/u/161170687?v=4 width="100;"  style="border-radius:50%;align-items:center;justify-content:center;overflow:hidden;padding-top:10px" alt=Ifrahd2/>
                <br />
                <sub style="font-size:14px"><b>Ifrahd2</b></sub>
            </a>
        </td>
        <td align="center" style="word-wrap: break-word; width: 150.0; height: 150.0">
            <a href=https://github.com/adoraaaaa>
                <img src=https://avatars.githubusercontent.com/u/235070161?v=4 width="100;"  style="border-radius:50%;align-items:center;justify-content:center;overflow:hidden;padding-top:10px" alt=adoraaaaa/>
                <br />
                <sub style="font-size:14px"><b>adoraaaaa</b></sub>
            </a>
        </td>
        <td align="center" style="word-wrap: break-word; width: 150.0; height: 150.0">
            <a href=https://github.com/Itsmike1>
                <img src=https://avatars.githubusercontent.com/u/235070684?v=4 width="100;"  style="border-radius:50%;align-items:center;justify-content:center;overflow:hidden;padding-top:10px" alt=Itsmike1/>
                <br />
                <sub style="font-size:14px"><b>Itsmike1</b></sub>
            </a>
        </td>
        <td align="center" style="word-wrap: break-word; width: 150.0; height: 150.0">
            <a href=https://github.com/solankz>
                <img src=https://avatars.githubusercontent.com/u/196202078?v=4 width="100;"  style="border-radius:50%;align-items:center;justify-content:center;overflow:hidden;padding-top:10px" alt=solankz/>
                <br />
                <sub style="font-size:14px"><b>solankz</b></sub>
            </a>
        </td>
        <td align="center" style="word-wrap: break-word; width: 150.0; height: 150.0">
            <a href=https://github.com/maqtr2004-glitch>
                <img src=https://avatars.githubusercontent.com/u/235070455?v=4 width="100;"  style="border-radius:50%;align-items:center;justify-content:center;overflow:hidden;padding-top:10px" alt=maqtr2004-glitch/>
                <br />
                <sub style="font-size:14px"><b>maqtr2004-glitch</b></sub>
            </a>
        </td>
    </tr>
</table>