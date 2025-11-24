# MyXen.University API Specification

## Overview

This document specifies the API endpoints needed to integrate the MyXen.University frontend with backend services. The API should handle authentication, payments, data management, and blockchain interactions.

## Base URL

```
Production: https://api.myxenpay.finance/v1/university
Development: http://localhost:3000/api/v1/university
```

## Authentication

All authenticated endpoints require a JWT token in the Authorization header:

```
Authorization: Bearer <jwt_token>
```

## API Endpoints

### 1. University Management

#### POST /universities/register
Register a new university application.

**Request:**
```json
{
  "name": "Sample University",
  "contactName": "John Doe",
  "contactEmail": "john@university.edu",
  "studentCount": 15000,
  "subscriptionPlan": "enterprise",
  "requestToken": true
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "universityId": "uni_abc123",
    "status": "pending",
    "message": "Application submitted for review"
  }
}
```

#### GET /universities
Get list of universities (CEO only).

**Query Parameters:**
- `status`: pending | approved | rejected
- `page`: number
- `limit`: number

**Response:**
```json
{
  "success": true,
  "data": {
    "universities": [
      {
        "id": "uni_abc123",
        "name": "Sample University",
        "students": 1247,
        "plan": "enterprise",
        "status": "approved",
        "revenue": 15234.56,
        "appliedDate": "2025-09-15T00:00:00Z"
      }
    ],
    "pagination": {
      "total": 47,
      "page": 1,
      "limit": 10
    }
  }
}
```

#### PUT /universities/:id/approve
Approve or reject university application (CEO only).

**Request:**
```json
{
  "approved": true,
  "feedback": "Welcome to MyXen.University!"
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "universityId": "uni_abc123",
    "status": "approved",
    "instanceUrl": "https://sample-university.myxen.university"
  }
}
```

#### GET /universities/:id/analytics
Get analytics for specific university.

**Response:**
```json
{
  "success": true,
  "data": {
    "studentsRegistered": 1247,
    "activeLocations": 37,
    "transactionVolume": 45672.89,
    "cashbackDistributed": 2283.64,
    "revenueGenerated": 15234.56,
    "monthlyGrowth": 15.3
  }
}
```

### 2. Student Management

#### POST /students/verify-email
Send verification code to student email.

**Request:**
```json
{
  "email": "student@university.edu",
  "universityId": "uni_abc123"
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "message": "Verification code sent",
    "expiresIn": 600
  }
}
```

#### POST /students/verify-code
Verify student email with code.

**Request:**
```json
{
  "email": "student@university.edu",
  "code": "123456"
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "studentId": "stu_xyz789",
    "token": "jwt_token_here",
    "university": {
      "id": "uni_abc123",
      "name": "Sample University"
    }
  }
}
```

#### POST /students/connect-wallet
Link Solana wallet to student account.

**Request:**
```json
{
  "walletAddress": "7xKXtg2CW87d97TXJSDpbD5jBkheTqA3YyU7YzMqX",
  "signature": "signature_proof"
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "studentId": "stu_xyz789",
    "walletAddress": "7xKXtg2CW87d97TXJSDpbD5jBkheTqA3YyU7YzMqX",
    "verified": true
  }
}
```

#### GET /students/dashboard
Get student dashboard data.

**Response:**
```json
{
  "success": true,
  "data": {
    "student": {
      "id": "stu_xyz789",
      "name": "John Doe",
      "email": "john@university.edu",
      "walletAddress": "7xKXt...YzMqX"
    },
    "cashback": {
      "total": 245.50,
      "monthlyLimit": 500,
      "remaining": 254.50
    },
    "transactions": {
      "count": 23,
      "thisMonth": 12
    }
  }
}
```

#### GET /students/transactions
Get student transaction history.

**Query Parameters:**
- `page`: number
- `limit`: number
- `startDate`: ISO date
- `endDate`: ISO date

**Response:**
```json
{
  "success": true,
  "data": {
    "transactions": [
      {
        "id": "tx_123",
        "merchant": "Campus Cafe",
        "amount": 12.50,
        "cashback": 0.63,
        "timestamp": "2025-11-24T10:24:00Z",
        "status": "completed"
      }
    ],
    "pagination": {
      "total": 23,
      "page": 1,
      "limit": 10
    }
  }
}
```

### 3. Merchant Management

#### POST /merchants/register
Register new campus merchant.

**Request:**
```json
{
  "businessName": "Campus Cafe",
  "location": "Student Union Building",
  "contactName": "Jane Smith",
  "contactEmail": "jane@campuscafe.com",
  "universityId": "uni_abc123"
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "merchantId": "mer_def456",
    "status": "pending",
    "message": "Application submitted for university approval"
  }
}
```

#### GET /merchants/:id/dashboard
Get merchant dashboard data.

**Response:**
```json
{
  "success": true,
  "data": {
    "merchant": {
      "id": "mer_def456",
      "businessName": "Campus Cafe",
      "location": "Student Union Building"
    },
    "metrics": {
      "totalRevenue": 12450.75,
      "transactionCount": 847,
      "averageTransaction": 14.70,
      "monthlyGrowth": 23.5
    }
  }
}
```

#### POST /merchants/:id/generate-qr
Generate payment QR code.

**Request:**
```json
{
  "amount": 12.50,
  "description": "Coffee and pastry"
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "paymentId": "pay_ghi789",
    "qrCode": "base64_encoded_qr",
    "qrUrl": "https://api.myxenpay.finance/pay/pay_ghi789",
    "expiresIn": 300
  }
}
```

#### GET /merchants/:id/transactions
Get merchant transaction history.

**Query Parameters:**
- `page`: number
- `limit`: number
- `startDate`: ISO date
- `endDate`: ISO date

**Response:**
```json
{
  "success": true,
  "data": {
    "transactions": [
      {
        "id": "tx_123",
        "student": "John D.",
        "amount": 12.50,
        "cashback": 0.63,
        "timestamp": "2025-11-24T10:24:00Z",
        "status": "completed"
      }
    ],
    "pagination": {
      "total": 847,
      "page": 1,
      "limit": 10
    }
  }
}
```

### 4. Payment Processing

#### POST /payments/initiate
Initiate payment transaction.

**Request:**
```json
{
  "studentId": "stu_xyz789",
  "merchantId": "mer_def456",
  "amount": 12.50,
  "paymentId": "pay_ghi789"
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "transactionId": "tx_123",
    "solanaTransaction": {
      "signature": "transaction_signature",
      "instructions": [/* Solana instructions */]
    },
    "cashback": 0.63,
    "status": "pending"
  }
}
```

#### POST /payments/confirm
Confirm payment completion.

**Request:**
```json
{
  "transactionId": "tx_123",
  "solanaSignature": "confirmed_signature"
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "transactionId": "tx_123",
    "status": "completed",
    "cashback": {
      "amount": 0.63,
      "credited": true
    },
    "settlement": {
      "merchantAmount": 11.87,
      "settled": true
    }
  }
}
```

#### GET /payments/:id
Get payment details.

**Response:**
```json
{
  "success": true,
  "data": {
    "transactionId": "tx_123",
    "student": {
      "id": "stu_xyz789",
      "name": "John Doe"
    },
    "merchant": {
      "id": "mer_def456",
      "businessName": "Campus Cafe"
    },
    "amount": 12.50,
    "cashback": 0.63,
    "timestamp": "2025-11-24T10:24:00Z",
    "status": "completed",
    "solanaSignature": "confirmed_signature"
  }
}
```

### 5. Token Management

#### POST /tokens/create
Request branded token creation.

**Request:**
```json
{
  "universityId": "uni_abc123",
  "serviceLevel": "full",
  "tokenName": "University Token",
  "tokenSymbol": "UNI",
  "totalSupply": 1000000000
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "tokenRequestId": "tok_jkl012",
    "status": "pending",
    "serviceLevel": "full",
    "cost": 1500,
    "estimatedCompletion": "2025-12-15T00:00:00Z"
  }
}
```

#### GET /tokens/:universityId
Get university token details.

**Response:**
```json
{
  "success": true,
  "data": {
    "token": {
      "address": "TokenkegQfeZyiNwAJbNbGKPFXCWuBvf9Ss623VQ5DA",
      "name": "University Token",
      "symbol": "UNI",
      "decimals": 9,
      "totalSupply": 1000000000
    },
    "status": "active",
    "createdDate": "2025-10-01T00:00:00Z"
  }
}
```

### 6. Analytics & Reporting

#### GET /analytics/platform
Get platform-wide analytics (CEO only).

**Response:**
```json
{
  "success": true,
  "data": {
    "totalUniversities": 47,
    "totalStudents": 58649,
    "totalRevenue": 2847392,
    "pendingApprovals": 3,
    "monthlyGrowth": 18.7,
    "systemHealth": {
      "uptime": 99.98,
      "activeTransactions": 2847,
      "successRate": 99.5
    }
  }
}
```

#### GET /analytics/university/:id
Get university-specific analytics.

**Query Parameters:**
- `startDate`: ISO date
- `endDate`: ISO date
- `metrics`: comma-separated list

**Response:**
```json
{
  "success": true,
  "data": {
    "period": {
      "start": "2025-11-01T00:00:00Z",
      "end": "2025-11-30T23:59:59Z"
    },
    "metrics": {
      "studentRegistrations": 147,
      "transactionVolume": 45672.89,
      "cashbackDistributed": 2283.64,
      "revenueGenerated": 15234.56,
      "activeLocations": 37
    },
    "trends": {
      "daily": [/* array of daily data */],
      "topMerchants": [/* top performing merchants */]
    }
  }
}
```

### 7. SOL Rewards

#### POST /rewards/distribute
Distribute SOL rewards (CEO only).

**Request:**
```json
{
  "distributions": [
    {
      "universityId": "uni_abc123",
      "amount": 500,
      "reason": "Top performer Q4"
    }
  ]
}
```

**Response:**
```json
{
  "success": true,
  "data": {
    "distributionId": "dist_mno345",
    "totalAmount": 500,
    "transactions": [
      {
        "universityId": "uni_abc123",
        "amount": 500,
        "signature": "solana_signature",
        "status": "completed"
      }
    ]
  }
}
```

#### GET /rewards/history
Get reward distribution history.

**Query Parameters:**
- `page`: number
- `limit`: number
- `universityId`: string (optional)

**Response:**
```json
{
  "success": true,
  "data": {
    "distributions": [
      {
        "id": "dist_mno345",
        "universityId": "uni_abc123",
        "universityName": "Sample University",
        "amount": 500,
        "date": "2025-11-15T00:00:00Z",
        "signature": "solana_signature"
      }
    ],
    "pagination": {
      "total": 25,
      "page": 1,
      "limit": 10
    }
  }
}
```

## Error Responses

All endpoints return errors in the following format:

```json
{
  "success": false,
  "error": {
    "code": "ERROR_CODE",
    "message": "Human readable error message",
    "details": {}
  }
}
```

### Common Error Codes

- `UNAUTHORIZED`: Missing or invalid authentication token
- `FORBIDDEN`: User lacks permission for this operation
- `NOT_FOUND`: Resource not found
- `VALIDATION_ERROR`: Invalid request data
- `RATE_LIMIT_EXCEEDED`: Too many requests
- `INTERNAL_ERROR`: Server error
- `BLOCKCHAIN_ERROR`: Solana transaction failed
- `INSUFFICIENT_BALANCE`: Not enough funds
- `DUPLICATE_ENTRY`: Resource already exists

## Rate Limiting

- **Standard Users**: 100 requests per minute
- **University Admins**: 500 requests per minute
- **CEO/Platform Admin**: 1000 requests per minute

Rate limit headers included in all responses:
```
X-RateLimit-Limit: 100
X-RateLimit-Remaining: 95
X-RateLimit-Reset: 1700000000
```

## Webhooks

The API can send webhooks for important events:

### Events

- `university.approved`: University application approved
- `student.verified`: Student email verified
- `payment.completed`: Payment transaction completed
- `cashback.distributed`: Cashback credited to student
- `token.deployed`: University token deployed
- `reward.distributed`: SOL reward distributed

### Webhook Payload

```json
{
  "event": "payment.completed",
  "timestamp": "2025-11-24T10:24:00Z",
  "data": {
    "transactionId": "tx_123",
    "amount": 12.50,
    "cashback": 0.63
  }
}
```

## Solana Integration

### Transaction Structure

All payments follow this structure:

1. Student initiates payment
2. Frontend creates transaction instructions
3. Student signs with connected wallet
4. Transaction sent to Solana network
5. Backend monitors for confirmation
6. Cashback calculated and distributed
7. Merchant receives settlement

### Smart Contract Addresses

```
Payment Program: [To be deployed]
Token Program: [To be deployed]
Cashback Program: [To be deployed]
```

## Security Requirements

### Authentication
- JWT tokens with 24-hour expiration
- Refresh tokens for extended sessions
- Email verification required for students
- 2FA optional for admin accounts

### Wallet Verification
- Signature verification for wallet connections
- Transaction signing by user
- No private keys stored on server

### Data Protection
- All sensitive data encrypted at rest
- HTTPS required for all API calls
- GDPR compliance for EU users
- PCI compliance for payment data

## Testing

### Test Environment
```
Base URL: https://api-test.myxenpay.finance/v1/university
```

### Test Accounts
- Test university credentials provided separately
- Test student accounts auto-generated
- Solana devnet for blockchain testing

### Mock Data
- All endpoints support mock data flag: `?mock=true`
- Returns sample data without database access
- Useful for frontend development

## Implementation Priority

### Phase 1 (Core)
1. ✅ University registration
2. ✅ Student verification
3. ✅ Payment processing
4. ✅ Cashback calculation

### Phase 2 (Analytics)
5. ⏳ Dashboard analytics
6. ⏳ Transaction history
7. ⏳ Revenue reporting

### Phase 3 (Advanced)
8. ⏳ Token creation
9. ⏳ SOL rewards
10. ⏳ Webhook system

### Phase 4 (Optimization)
11. ⏳ Real-time updates (WebSockets)
12. ⏳ Advanced caching
13. ⏳ Performance optimization

---

**Last Updated**: November 24, 2025  
**API Version**: v1  
**Status**: 📋 Specification Complete, Implementation Pending
