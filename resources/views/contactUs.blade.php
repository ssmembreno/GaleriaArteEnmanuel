@extends('_layouts/layout')

@section('contentContactUs')
    <h1>Contact Us</h1>
    <p>If you have any questions, feel free to reach out to us!</p>
    <form action="/submit-contact" method="POST">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message"></textarea><br>
        <input type="submit" value="Submit">
    </form>
@endSection