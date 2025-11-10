<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyXenPay Logo Optimizer</title>
    <script src="https://unpkg.com/react@18/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons as SVG -->
    <style>
        .lucide-icon {
            width: 1em;
            height: 1em;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }
    </style>
</head>
<body>
    <div id="root"></div>

    <script type="text/babel">
        const { useState, useRef } = React;

        // Simple SVG icons to replace Lucide React
        const UploadIcon = () => React.createElement('svg', {
            className: 'lucide-icon',
            viewBox: '0 0 24 24'
        }, [
            React.createElement('path', { key: '1', d: 'M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4' }),
            React.createElement('polyline', { key: '2', points: '17 8 12 3 7 8' }),
            React.createElement('line', { key: '3', x1: '12', y1: '3', x2: '12', y2: '15' })
        ]);

        const DownloadIcon = () => React.createElement('svg', {
            className: 'lucide-icon',
            viewBox: '0 0 24 24'
        }, [
            React.createElement('path', { key: '1', d: 'M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4' }),
            React.createElement('polyline', { key: '2', points: '7 10 12 15 17 10' }),
            React.createElement('line', { key: '3', x1: '12', y1: '15', x2: '12', y2: '3' })
        ]);

        const SparklesIcon = () => React.createElement('svg', {
            className: 'lucide-icon',
            viewBox: '0 0 24 24'
        }, [
            React.createElement('path', { key: '1', d: 'm12 3-1.9 5.8a2 2 0 0 1-1.287 1.288L3 12l5.8 1.9a2 2 0 0 1 1.288 1.287L12 21l1.9-5.8a2 2 0 0 1 1.287-1.288L21 12l-5.8-1.9a2 2 0 0 1-1.288-1.287Z' })
        ]);

        function LogoOptimizer() {
            const [originalImage, setOriginalImage] = useState(null);
            const [processedImages, setProcessedImages] = useState([]);
            const [isProcessing, setIsProcessing] = useState(false);
            const fileInputRef = useRef(null);

            const logoSizes = [
                { name: 'Favicon 16x16', width: 16, height: 16, category: 'favicon' },
                { name: 'Favicon 32x32', width: 32, height: 32, category: 'favicon' },
                { name: 'Favicon 48x48', width: 48, height: 48, category: 'favicon' },
                { name: 'Apple Touch Icon', width: 180, height: 180, category: 'favicon' },
                { name: 'Android Chrome', width: 192, height: 192, category: 'favicon' },
                { name: 'Android Chrome 512', width: 512, height: 512, category: 'favicon' },
                { name: 'Header Small', width: 200, height: 60, category: 'header' },
                { name: 'Header Standard', width: 300, height: 90, category: 'header' },
                { name: 'Header Large', width: 400, height: 120, category: 'header' },
                { name: 'Social Media OG', width: 1200, height: 630, category: 'social' },
                { name: 'Social Square', width: 1200, height: 1200, category: 'social' },
                { name: 'Thumbnail', width: 150, height: 150, category: 'general' },
                { name: 'Medium', width: 300, height: 300, category: 'general' },
                { name: 'Large', width: 600, height: 600, category: 'general' },
            ];

            const handleFileUpload = (e) => {
                const file = e.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        const img = new Image();
                        img.onload = () => {
                            setOriginalImage({ file, img, url: event.target.result });
                        };
                        img.src = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            };

            const resizeImage = (img, width, height) => {
                const canvas = document.createElement('canvas');
                canvas.width = width;
                canvas.height = height;
                const ctx = canvas.getContext('2d');
                
                const imgAspect = img.width / img.height;
                const targetAspect = width / height;
                
                let drawWidth, drawHeight, offsetX, offsetY;
                
                if (imgAspect > targetAspect) {
                    drawHeight = height;
                    drawWidth = height * imgAspect;
                    offsetX = (width - drawWidth) / 2;
                    offsetY = 0;
                } else {
                    drawWidth = width;
                    drawHeight = width / imgAspect;
                    offsetX = 0;
                    offsetY = (height - drawHeight) / 2;
                }
                
                ctx.clearRect(0, 0, width, height);
                ctx.drawImage(img, offsetX, offsetY, drawWidth, drawHeight);
                
                return canvas.toDataURL('image/png');
            };

            const processImages = () => {
                if (!originalImage) return;
                
                setIsProcessing(true);
                
                setTimeout(() => {
                    const processed = logoSizes.map(size => {
                        const dataUrl = resizeImage(originalImage.img, size.width, size.height);
                        return {
                            ...size,
                            dataUrl,
                            fileName: `myxenpay-logo-${size.width}x${size.height}.png`
                        };
                    });
                    
                    setProcessedImages(processed);
                    setIsProcessing(false);
                }, 500);
            };

            const downloadImage = (dataUrl, fileName) => {
                const link = document.createElement('a');
                link.href = dataUrl;
                link.download = fileName;
                link.click();
            };

            const downloadAll = () => {
                processedImages.forEach((img, index) => {
                    setTimeout(() => {
                        downloadImage(img.dataUrl, img.fileName);
                    }, index * 200);
                });
            };

            const groupedImages = processedImages.reduce((acc, img) => {
                if (!acc[img.category]) acc[img.category] = [];
                acc[img.category].push(img);
                return acc;
            }, {});

            return React.createElement('div', { 
                className: 'min-h-screen bg-gradient-to-br from-blue-50 to-cyan-50 p-8'
            }, [
                React.createElement('div', {
                    key: 'container',
                    className: 'max-w-6xl mx-auto'
                }, [
                    React.createElement('div', {
                        key: 'header',
                        className: 'text-center mb-8'
                    }, [
                        React.createElement('h1', {
                            key: 'title',
                            className: 'text-4xl font-bold text-blue-900 mb-2'
                        }, 'MyXenPay Logo Optimizer'),
                        React.createElement('p', {
                            key: 'subtitle',
                            className: 'text-gray-600'
                        }, 'Upload your logo and get all website-ready sizes instantly')
                    ]),

                    !originalImage ? React.createElement('div', {
                        key: 'upload-area',
                        className: 'bg-white rounded-lg shadow-lg p-12'
                    }, [
                        React.createElement('div', {
                            key: 'drop-zone',
                            onClick: () => fileInputRef.current.click(),
                            className: 'border-4 border-dashed border-blue-300 rounded-lg p-16 text-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all'
                        }, [
                            React.createElement(UploadIcon, { 
                                key: 'icon',
                                className: 'w-16 h-16 mx-auto mb-4 text-blue-500'
                            }),
                            React.createElement('h3', {
                                key: 'title',
                                className: 'text-xl font-semibold text-gray-700 mb-2'
                            }, 'Upload Your Logo'),
                            React.createElement('p', {
                                key: 'instruction1',
                                className: 'text-gray-500'
                            }, 'Click to browse or drag and drop'),
                            React.createElement('p', {
                                key: 'instruction2',
                                className: 'text-sm text-gray-400 mt-2'
                            }, 'PNG, JPG, or GIF (Max 10MB)')
                        ]),
                        React.createElement('input', {
                            key: 'file-input',
                            ref: fileInputRef,
                            type: 'file',
                            accept: 'image/*',
                            onChange: handleFileUpload,
                            className: 'hidden'
                        })
                    ]) : React.createElement('div', {
                        key: 'processing-area',
                        className: 'space-y-6'
                    }, [
                        React.createElement('div', {
                            key: 'original',
                            className: 'bg-white rounded-lg shadow-lg p-6'
                        }, [
                            React.createElement('h2', {
                                key: 'title',
                                className: 'text-2xl font-bold text-gray-800 mb-4'
                            }, 'Original Logo'),
                            React.createElement('div', {
                                key: 'content',
                                className: 'flex flex-col md:flex-row items-center gap-6'
                            }, [
                                React.createElement('img', {
                                    key: 'image',
                                    src: originalImage.url,
                                    alt: 'Original logo',
                                    className: 'w-48 h-48 object-contain border border-gray-200 rounded'
                                }),
                                React.createElement('div', {
                                    key: 'actions',
                                    className: 'flex-1'
                                }, [
                                    React.createElement('p', {
                                        key: 'description',
                                        className: 'text-gray-600 mb-4'
                                    }, 'Your logo is ready to be optimized!'),
                                    React.createElement('div', {
                                        key: 'buttons',
                                        className: 'flex flex-wrap gap-4'
                                    }, [
                                        React.createElement('button', {
                                            key: 'generate',
                                            onClick: processImages,
                                            disabled: isProcessing,
                                            className: 'bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors disabled:bg-gray-400 flex items-center gap-2'
                                        }, [
                                            React.createElement(SparklesIcon, { key: 'icon', className: 'w-5 h-5' }),
                                            isProcessing ? 'Processing...' : 'Generate All Sizes'
                                        ]),
                                        React.createElement('button', {
                                            key: 'upload-different',
                                            onClick: () => {
                                                setOriginalImage(null);
                                                setProcessedImages([]);
                                            },
                                            className: 'bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors'
                                        }, 'Upload Different Image')
                                    ])
                                ])
                            ])
                        ]),

                        processedImages.length > 0 && React.createElement('div', {
                            key: 'processed',
                            className: 'bg-white rounded-lg shadow-lg p-6'
                        }, [
                            React.createElement('div', {
                                key: 'header',
                                className: 'flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4'
                            }, [
                                React.createElement('h2', {
                                    key: 'title',
                                    className: 'text-2xl font-bold text-gray-800'
                                }, 'Generated Logo Sizes'),
                                React.createElement('button', {
                                    key: 'download-all',
                                    onClick: downloadAll,
                                    className: 'bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors flex items-center gap-2'
                                }, [
                                    React.createElement(DownloadIcon, { key: 'icon', className: 'w-5 h-5' }),
                                    `Download All (${processedImages.length})`
                                ])
                            ]),

                            Object.entries(groupedImages).map(([category, images]) => 
                                React.createElement('div', {
                                    key: category,
                                    className: 'mb-8'
                                }, [
                                    React.createElement('h3', {
                                        key: 'title',
                                        className: 'text-lg font-semibold text-gray-700 mb-4 capitalize border-b pb-2'
                                    }, `${category} Logos`),
                                    React.createElement('div', {
                                        key: 'grid',
                                        className: 'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4'
                                    }, images.map((img, index) => 
                                        React.createElement('div', {
                                            key: index,
                                            className: 'border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow'
                                        }, [
                                            React.createElement('div', {
                                                key: 'preview',
                                                className: 'bg-gray-50 rounded mb-3 p-4 flex items-center justify-center',
                                                style: { height: '120px' }
                                            }, [
                                                React.createElement('img', {
                                                    key: 'image',
                                                    src: img.dataUrl,
                                                    alt: img.name,
                                                    className: 'max-w-full max-h-full object-contain'
                                                })
                                            ]),
                                            React.createElement('p', {
                                                key: 'name',
                                                className: 'text-sm font-medium text-gray-700 mb-1'
                                            }, img.name),
                                            React.createElement('p', {
                                                key: 'dimensions',
                                                className: 'text-xs text-gray-500 mb-3'
                                            }, `${img.width} × ${img.height} px`),
                                            React.createElement('button', {
                                                key: 'download',
                                                onClick: () => downloadImage(img.dataUrl, img.fileName),
                                                className: 'w-full bg-blue-600 text-white text-sm py-2 rounded hover:bg-blue-700 transition-colors flex items-center justify-center gap-2'
                                            }, [
                                                React.createElement(DownloadIcon, { key: 'icon', className: 'w-4 h-4' }),
                                                'Download'
                                            ])
                                        ])
                                    ))
                                ])
                            )
                        ])
                    ]),

                    React.createElement('div', {
                        key: 'instructions',
                        className: 'bg-blue-50 border border-blue-200 rounded-lg p-6 mt-8'
                    }, [
                        React.createElement('h3', {
                            key: 'title',
                            className: 'font-semibold text-blue-900 mb-3'
                        }, 'Quick Instructions:'),
                        React.createElement('ol', {
                            key: 'list',
                            className: 'list-decimal list-inside space-y-2 text-blue-800'
                        }, [
                            React.createElement('li', { key: '1' }, 'Upload your MyXenPay logo image'),
                            React.createElement('li', { key: '2' }, 'Click "Generate All Sizes" to create optimized versions'),
                            React.createElement('li', { key: '3' }, 'Download individual sizes or click "Download All"'),
                            React.createElement('li', { key: '4' }, 'Use the generated files on your website')
                        ]),
                        React.createElement('div', {
                            key: 'tip',
                            className: 'mt-4 p-4 bg-white rounded border border-blue-200'
                        }, [
                            React.createElement('p', {
                                key: 'text',
                                className: 'text-sm text-gray-700'
                            }, [
                                React.createElement('strong', { key: 'bold' }, 'Tip:'),
                                ' For best results, upload a high-resolution PNG with transparent background. The tool will automatically resize and maintain aspect ratio.'
                            ])
                        ])
                    ])
                ])
            ]);
        }

        // Render the app
        ReactDOM.render(React.createElement(LogoOptimizer), document.getElementById('root'));
    </script>
</body>
</html>