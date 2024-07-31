  /**
   * SmartDental online appointments booking module.
   * 
   * Log HTTP request details for SmartDental PHP files using morgan.
   * Proxy those requests through local PHP dev server on port 8000.
   */
const { createProxyMiddleware } = require('http-proxy-middleware');
const morgan = require('morgan'); // For logging HTTP requests

// Create a proxy middleware with logging
const proxyMiddleware = createProxyMiddleware('/rejestracja-online', {
  target: 'http://localhost:8000',
  pathRewrite: { '^/rejestracja-online': '/rejestracja-online' },
  changeOrigin: true,
  logLevel: 'debug', // Enables detailed logging
  onProxyReq: (proxyReq, req, res) => {
    console.log(`Proxying request ${req.method} ${req.url}`);
  },
  onProxyRes: (proxyRes, req, res) => {
    console.log(`Received response with status ${proxyRes.statusCode} for ${req.method} ${req.url}`);
  }
});

// Use morgan for logging and then proxy
module.exports = (req, res, next) => {
  morgan('combined')(req, res, () => {
    proxyMiddleware(req, res, next);
  });
};
