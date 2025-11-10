const express = require('express');
const path = require('path');
const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(express.json());
app.use(express.static(path.join(__dirname, 'public')));

// API Routes
app.post('/api/connect-wallet', (req, res) => {
  // In a real application, you would validate the wallet connection
  const { walletAddress } = req.body;
  
  // Simulate wallet verification
  if (walletAddress && walletAddress.startsWith('0x')) {
    res.json({ 
      success: true, 
      message: 'Wallet connected successfully',
      balance: '5.42 SOL'
    });
  } else {
    res.status(400).json({ 
      success: false, 
      message: 'Invalid wallet address' 
    });
  }
});

app.post('/api/transaction', (req, res) => {
  const { myxnAmount, solAmount, walletAddress } = req.body;
  
  // Validate transaction
  if (!myxnAmount || !solAmount || !walletAddress) {
    return res.status(400).json({
      success: false,
      message: 'Missing required transaction details'
    });
  }
  
  // Simulate transaction processing
  const transactionHash = '0x' + Math.random().toString(16).substring(2, 42) + Math.random().toString(16).substring(2, 42);
  
  // In a real application, you would interact with blockchain here
  setTimeout(() => {
    res.json({
      success: true,
      message: `Successfully purchased ${myxnAmount} MYXN for ${solAmount} SOL`,
      transactionHash: transactionHash,
      timestamp: new Date().toISOString()
    });
  }, 2000);
});

app.get('/api/exchange-rate', (req, res) => {
  // In a real application, you would fetch this from a price oracle
  res.json({
    rate: 0.05, // 1 MYXN = 0.05 SOL
    lastUpdated: new Date().toISOString()
  });
});

// Serve the main page
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

app.listen(PORT, () => {
  console.log(`MyXenPay server running on port ${PORT}`);
});