const http = require('http');
const fs = require('fs');

const port = 3000;

const server = http.createServer();

server.on('request', function (request, response) {
    console.log(request.method);
    console.log('Request received');
    const headers = {
        'Content-Type': 'text/plain',
        'Access-Control-Allow-Origin': '*'
    };

    response.writeHead(200, headers);
    response.write('blue');
    response.end();
});

server.listen(port, error => {
    if (error) {
        console.log('Error', error)
    } else {
        console.log('Server is listening on port', port);
    }
})
