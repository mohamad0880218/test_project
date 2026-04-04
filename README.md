# 🚀 DevOps Multi-Platform Web Application

![CI/CD Status](https://img.shields.io/github/workflow/status/mohamad0880218/devops-cicd-webapp/CI-CD?logo=github&label=CI/CD%20Pipeline&style=flat-square)

This repository demonstrates a **full-stack HTML web application** with a **MongoDB database**, deployed across multiple platforms using **Docker, Docker Swarm, and Kubernetes**, with a **CI/CD pipeline** powered by **GitHub Actions**.  

It showcases **end-to-end DevOps skills**, including containerization, orchestration, automated testing, and multi-environment deployment.

---

## 📊 Architecture Diagram

![CI/CD Architecture](./assets/cicd-architecture.png)

---

## 🛠️ Key Components

| Component         | Purpose                                      |
|------------------|----------------------------------------------|
| GitHub Actions    | CI/CD automation                             |
| Docker            | Containerization for local & production     |
| Docker Swarm      | Multi-node orchestration                      |
| Kubernetes (K8s)  | Scalable container deployment                 |
| MongoDB           | Database for application data                 |
| HTML / CSS / JS   | Frontend                                      |
| PHP / ASP.NET     | Backend                                      |
| Ansible (Optional)| Infrastructure automation & deployment       |
| YAML              | Workflow & orchestration configuration       |

---

## 🔁 CI/CD Pipeline Flow

```text
Git Push
   ↓
GitHub Actions
   ↓
Frontend & Backend Tests
   ↓
Docker Build
   ↓
Deploy to Testing Environment (Docker / Swarm / Kubernetes)
   ↓
[Manual Approval]
   ↓
Deploy to Production Environment
