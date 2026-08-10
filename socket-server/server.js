const express = require('express');
const http = require('http');
const cors = require('cors');
const { Server } = require('socket.io');

const app = express();

app.use(cors());
app.use(express.json());

const server = http.createServer(app);

const io = new Server(server, {
    cors: {
        origin: [
            "http://localhost:8000",
            "http://127.0.0.1:8000"
        ],
        methods: ["GET", "POST"]
    }
});

io.on('connection', (socket) => {

    console.log('Admin connected:', socket.id);

    socket.on('disconnect', () => {
        console.log('Admin disconnected:', socket.id);
    });

});

app.post('/complaint-created', (req, res) => {

    const complaint = req.body;

    console.log('New complaint received:');
    console.log(complaint);

    io.emit('new-complaint', complaint);

    res.json({
        success: true,
        message: 'Complaint event sent'
    });

});

app.get('/', (req, res) => {
    res.json({
        message: 'Hostel Management Socket Server is running'
    });
});

server.listen(3000, () => {

    console.log('Socket server running on http://localhost:3000');

});