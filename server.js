const http = require('http');
const url = require('url');

const server = http.createServer((req, res) => {
    const parsedUrl = url.parse(req.url, true);
    const pathname = parsedUrl.pathname;

    // Set response headers only once
    res.setHeader('Content-Type', 'application/json');

    if (pathname === '/') {
        res.writeHead(200);
        res.end(JSON.stringify({ message: 'Welcome to Hospital Management System' }));
    } else if (pathname === '/patients') {
        res.writeHead(200);
        res.end(JSON.stringify({ patients: ['John Doe', 'Jane Smith', 'Michael Brown'] }));
    } else if (pathname === '/doctors') {
        res.writeHead(200);
        res.end(JSON.stringify({ doctors: ['Dr. Adams', 'Dr. Johnson', 'Dr. Lee'] }));
    } else if (pathname === '/appointments') {
        res.writeHead(200);
        res.end(JSON.stringify({
            appointments: [
                { patient: 'John Doe', doctor: 'Dr. Adams', time: '10:00 AM' },
                { patient: 'Jane Smith', doctor: 'Dr. Johnson', time: '11:30 AM' }
            ]
        }));
    } else {
        res.writeHead(404);
        res.end(JSON.stringify({ error: 'Not Found' }));
    }
});

const PORT = 3000;
server.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});
 
