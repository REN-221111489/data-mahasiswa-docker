# Convert Minikube certificates to base64 for GitHub Actions

# Path ke certificate files
$caPath = "$HOME\.minikube\ca.crt"
$certPath = "$HOME\.minikube\profiles\minikube\client.crt"
$keyPath = "$HOME\.minikube\profiles\minikube\client.key"

# Cek file ada atau tidak
if (-not (Test-Path $caPath)) {
    Write-Host "ERROR: File $caPath tidak ditemukan!" -ForegroundColor Red
    exit 1
}
if (-not (Test-Path $certPath)) {
    Write-Host "ERROR: File $certPath tidak ditemukan!" -ForegroundColor Red
    exit 1
}
if (-not (Test-Path $keyPath)) {
    Write-Host "ERROR: File $keyPath tidak ditemukan!" -ForegroundColor Red
    exit 1
}

# Baca file dan convert ke base64
$ca = [Convert]::ToBase64String([System.IO.File]::ReadAllBytes($caPath))
$cert = [Convert]::ToBase64String([System.IO.File]::ReadAllBytes($certPath))
$key = [Convert]::ToBase64String([System.IO.File]::ReadAllBytes($keyPath))

# Server address (sesuaikan jika berbeda)
$server = "https://127.0.0.1:63924"

# Buat kubeconfig baru dengan data base64
$kubeconfig = @"
apiVersion: v1
clusters:
- cluster:
    certificate-authority-data: $ca
    server: $server
  name: minikube
contexts:
- context:
    cluster: minikube
    user: minikube
  name: minikube
current-context: minikube
kind: Config
users:
- name: minikube
  user:
    client-certificate-data: $cert
    client-key-data: $key
"@

# Convert kubeconfig ke base64
$kubeconfigBytes = [System.Text.Encoding]::UTF8.GetBytes($kubeconfig)
$base64Kubeconfig = [Convert]::ToBase64String($kubeconfigBytes)

# Output hasil
Write-Host ""
Write-Host "=== COPY INI UNTUK GITHUB SECRET ==="
Write-Host $base64Kubeconfig
Write-Host "===================================="
Write-Host ""