import { spawn } from 'child_process';
import { writeFileSync } from 'fs';

const html = `
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; }
        body { font-family: system-ui; background: #f0f0f0; }
        .phone { 
            width: 390px; 
            height: 844px; 
            border: 15px solid #000;
            border-radius: 45px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            margin: 20px auto;
        }
        iframe { 
            width: 100%; 
            height: 100%; 
            border: none;
        }
    </style>
</head>
<body>
    <div class="phone">
        <iframe src="http://localhost:8000" style="transform: scale(1); transform-origin: 0 0;"></iframe>
    </div>
</body>
</html>
`;

writeFileSync('/tmp/phone-preview.html', html);
console.log('HTML created at /tmp/phone-preview.html');
