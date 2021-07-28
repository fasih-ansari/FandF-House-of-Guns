const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');
const hbs = require('hbs');
const mysql = require('mysql');
const cors = require('cors');
const app = express();

//Create connection
const conn = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '090078601',
    database: 'fnf'
});

//connect to database
conn.connect((err) => {
    if (err) throw err;
    console.log('Connection has been made to Databse');
});

// middleware
app.use(express.json());
app.use(cors());

//set views file
app.set('views', path.join(__dirname, 'views'));

//set view engine
app.set('view engine', 'hbs');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));

//set public folder as static folder for static file
app.use('/assets', express.static(__dirname + '/public'));

//------------------------------------------------------------------------
function onClick(res){
    let sql = "SELECT SUM(product_price) FROM cart";
    let query = conn.query(sql, (err, results) => {
        if (err) throw err;
        // res.redirect(alert(`Total Amount = ${results}`));
        res.redirect('/totalamount')
    });
}

app.get("/totalamount", function (req, res) {
    onClick(res);
    // alert(`Total Amount = ${res}`);
});



//--------------------------------------------------------------------

// route to display and 
app.get('/', (req, res) => {
    let sql = "SELECT * FROM cart";
    let query = conn.query(sql, (err, results) => {
        if (err) throw err;
        res.render('product_view', {
            results: results
        });
    });
});

//route for insert data
app.post('/save', (req, res) => {
    let data = { product_name: req.body.product_name, product_price: 6000 };
    let sql = "INSERT INTO cart SET ?";
    let query = conn.query(sql, data, (err, results) => {
        if (err) throw err;
        res.redirect('/');
    });
});

//route for update data
app.post('/update', (req, res) => {
    let sql = "UPDATE cart SET product_name='" + req.body.product_name + "', product_price='" + req.body.product_price + "' WHERE product_id=" + req.body.id;
    let query = conn.query(sql, (err, results) => {
        if (err) throw err;
        res.redirect('/');
    });
});

//route for delete data
app.post('/delete', (req, res) => {
    let sql = "DELETE FROM cart WHERE product_id=" + req.body.product_id + "";
    let query = conn.query(sql, (err, results) => {
        if (err) throw err;
        res.redirect('/');
    });
});

// //server listening
app.listen(5000, () => {
    console.log('Server is running at port 5000');
});

