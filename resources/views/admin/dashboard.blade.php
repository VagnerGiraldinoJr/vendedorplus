@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
    <h1 class="text-center">📊 Painel Administrativo - Visão Estratégica</h1>
@stop

@section('content')

    <!-- 🚀 Seção 1: Cards Informativos -->
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>R$ 25.000</h3>
                    <p>💳 Contas a Receber</p>
                </div>
                <div class="icon">
                    <i class="fas fa-wallet"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>350</h3>
                    <p>🛒 Total de Vendas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>1.200</h3>
                    <p>📦 Total de Produtos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>950</h3>
                    <p>👥 Clientes Ativos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- 📊 Seção 2: Relatórios e Metas -->
    <div class="row">
        <!-- Relatórios -->
        <div class="col-md-6">
            <div class="card bg-light">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-file-alt"></i> Relatórios</h3>
                </div>
                <div class="card-body">
                    <p>📊 <a href="#">Relatório de Vendas Mensal</a></p>
                    <p>📊 <a href="#">Relatório Financeiro</a></p>
                    <p>📊 <a href="#">Análise de Estoque</a></p>
                </div>
            </div>
        </div>

        <!-- Metas -->
        <div class="col-md-6">
            <div class="card bg-secondary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-bullseye"></i> Metas</h3>
                </div>
                <div class="card-body">
                    <p><strong>🎯 Meta de Vendas:</strong> 500</p>
                    <p><strong>🚀 Progresso Atual:</strong> 70%</p>
                    <p><strong>🏁 Meta Financeira:</strong> R$ 100.000</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 📈 Seção 3: Gráficos Estratégicos -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-line"></i> Faturamento Mensal</h3>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-bar"></i> Vendas por Produto</h3>
                </div>
                <div class="card-body">
                    <canvas id="productSalesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- 📨 Seção 4: Mensageria para Clientes -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="card-title"><i class="fas fa-envelope"></i> Mensageria para Clientes</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf
                        <div class="form-group">
                            <label for="messageTitle">Título da Mensagem</label>
                            <input type="text" id="messageTitle" name="messageTitle" class="form-control" placeholder="Digite o título da mensagem">
                        </div>
                        <div class="form-group">
                            <label for="messageContent">Conteúdo da Mensagem</label>
                            <div class="d-flex align-items-center">
                                <textarea id="messageContent" name="messageContent" class="form-control" rows="4" placeholder="Digite o conteúdo da mensagem"></textarea>
                                <button type="button" id="emojiBtn" class="btn btn-outline-secondary ml-2">😀</button>
                            </div>
                            <div id="emojiPicker" class="mt-2" style="display: none;"></div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">
                            <i class="fas fa-paper-plane"></i> Enviar Mensagem
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <style>
        .small-box {
            text-align: center;
        }
        #emojiPicker {
            grid-template-columns: repeat(auto-fill, minmax(32px, 1fr));
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Gráficos
        new Chart(document.getElementById('revenueChart'), {
            type: 'line',
            data: { labels: ['Jan', 'Fev'], datasets: [{ label: 'Faturamento', data: [12000, 15000] }] }
        });

        new Chart(document.getElementById('productSalesChart'), {
            type: 'bar',
            data: { labels: ['Produto A', 'Produto B'], datasets: [{ label: 'Vendas', data: [200, 300] }] }
        });

        // Emojis
        document.addEventListener('DOMContentLoaded', () => {
            const emojiBtn = document.getElementById('emojiBtn');
            const emojiPicker = document.getElementById('emojiPicker');
            const messageContent = document.getElementById('messageContent');
            const emojis = ['😀', '😁', '😂', '😃', '😄','🎯','🚀','🏁'];


            emojis.forEach(emoji => {
                const span = document.createElement('span');
                span.textContent = emoji;
                span.onclick = () => messageContent.value += emoji;
                emojiPicker.appendChild(span);
            });

            emojiBtn.onclick = () => emojiPicker.style.display = emojiPicker.style.display === 'none' ? 'grid' : 'none';
        });
    </script>
@stop
