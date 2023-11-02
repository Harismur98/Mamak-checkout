<h2 style="color:cyan">Installation</h2>
<ul>
    <li>Clone the Repo: <br> </li>
    <li style=""> > git clone https://github.com/Harismur98/Mamak-checkout.git</li>
    <li> > cd Mamak-checkout</li>
    <li> > composer install or composer update</li>
    <li> > duplicate (.env.example) file and change the name to (.env)</li>
    <li> > Set up .env file</li>
    <li> > php artisan serve</li>
    <li> <a href="http://127.0.0.1:8000/">http://127.0.0.1:8000/</a> </li>
</ul>
<h2 style="color:pink">Testing</h2>
<ul>
    <li>Donwload postman from https://www.postman.com/downloads/ and install it</li>
    <li>Click import and insert this link (curl -X POST -d "items=B001,F001,B002,B001,F001" http://localhost:8000/api/checkout)</li>
    <li>You can add or remove the items on body tab</li>
    <li>When you click send it will return the total price</li>
</ul>

<p style="color:yellow">Thanks ❤<p>