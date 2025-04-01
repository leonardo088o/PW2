const exp = require('express')
const app = exp()

app.get('/teste', (req, res)=>{
    res.send("Luiz")
})

app.get('/leo', (req, res)=>{res.send("gol")})
app.listen(9999, ()=>{console.log("server online")})    