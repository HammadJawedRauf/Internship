const express = require("express");
const users = require(".api.json");
const app = express();
const port = 8000;

app.get('/users (req,res)=>{

return res.json(users);

})