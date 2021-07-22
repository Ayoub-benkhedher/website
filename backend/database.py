from flask import Flask, request, render_template, redirect, flash
from flask_sqlalchemy import SQLAlchemy
import requests
import sys

app = Flask(__name__)
app.secret_key = b'_5#y2L"F4Q8z\n\xec]/'
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///organicproduce.db'
db = SQLAlchemy(app)


class Item(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(50), nullable=False)
    qty = db.Column(db.Integer, nullable=False)
    unit = db.Column(db.String(3), nullable=False)
    description = db.Column(db.String(150))
    price = db.Column(db.Numeric)
    image_path = db.Column(db.String(500))
    orders = db.relationship('OrderItem', back_populates='item')

    def __repr__(self):
        return str(self.id) + " " + self.name + " " + str(self.qty) + " " + self.unit + " " + self.description + " " + str(self.price)


class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    first_name = db.Column(db.String(50), nullable=False)
    last_name = db.Column(db.String(50), nullable=False)
    phone = db.Column(db.String(11), unique=True)
    email = db.Column(db.String(100), unique=True, nullable=False)
    password = db.Column(db.String(50), nullable=False)
    address = db.Column(db.String(200))
    city = db.Column(db.String(200))
    state = db.Column(db.String(2))
    zip_code = db.Column(db.String(10))
    orders = db.relationship('Order', backref='user', lazy=True)


class OrderItem(db.Model):
    order_id = db.Column(db.Integer, db.ForeignKey('order.id'), primary_key=True)
    item_id = db.Column(db.Integer, db.ForeignKey('item.id'), primary_key=True)
    qty = db.Column(db.Integer, nullable=False)
    item_total = db.Column(db.Numeric, nullable=False)
    order = db.relationship('Order', back_populates="items")
    item = db.relationship('Item', back_populates="orders")


class Order(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    date = db.Column(db.Date, nullable=False)
    total = db.Column(db.Numeric, nullable=False)
    user_id = db.Column(db.Integer, db.ForeignKey('user.id'), nullable=False)
    items = db.relationship('OrderItem', back_populates='order')
    # stock = db.relationship('OrderItem', backref='order', primaryjoin=id == OrderItem.order.id)


db.create_all()


while True:
    text = input("0. Exit; 1. Insert into table; 2.Display table data\n")
    if text == "0":
        break
    elif text == "1":
        option = input("Insert into: 1. Item 2. User 3. Order 4. OrderItem\n")
        if option == "1":
            data = input("Enter name, qty, unit, description, price\n").split()
            new_item = Item(name=data[0], qty=data[1], unit=data[2], description=data[3], price=data[4])
        elif option == "2":
            data = input("Enter first name, last name, phone, email, password\n").split()
            new_item = User(first_name=data[0], last_name=data[0], phone=data[0], email=data[0], password=data[0])
        elif option == "3":
            data = input("Enter date, total, user id\n").split()
            new_item = Order(date=data[0], total=data[1], user_id=data[2])
        elif option == "4":
            data = input("Enter order_id, item_id, qty, item_total\n").split()
            new_item = OrderItem(order_id=data[0], item_id=data[1], qty=data[2], item_total=data[3])
        db.session.add(new_item)
        db.session.commit()
    elif text == "2":
        option = input("Show data of table: 1. Item 2. User 3. Order 4. OrderItem\n")
        items = Item.query.all()
        for item in items:
            print(item)

