<?php

namespace App\Http\Controllers;

use App\Models\Estabelecimento;
use App\Models\SolicitacaoRemocao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RemocaoController extends Controller
{
    public function index(string $cnpj): View
    {
        $cnpjLimpo = preg_replace('/[^0-9]/', '', $cnpj);

        if (strlen($cnpjLimpo) !== 14 || $this->jaRemovido($cnpjLimpo)) {
            abort(404);
        }

        return view('remocao', [
            'cnpj' => $cnpjLimpo,
            'cnpj_formatado' => $this->formatarCnpj($cnpjLimpo),
        ]);
    }

    public function store(Request $request, string $cnpj): RedirectResponse
    {
        $cnpjLimpo = preg_replace('/[^0-9]/', '', $cnpj);

        if (strlen($cnpjLimpo) !== 14 || $this->jaRemovido($cnpjLimpo)) {
            abort(404);
        }

        $data = $request->validate([
            'nome_responsavel' => 'required|string|max:255',
            'confirmou_nao_divulgamos' => 'accepted',
            'ciente_dados_publicos' => 'accepted',
            'ciente_prazo_busca' => 'accepted',
        ]);

        SolicitacaoRemocao::create([
            'cnpj' => $cnpjLimpo,
            'nome_responsavel' => $data['nome_responsavel'],
            'confirmou_nao_divulgamos' => true,
            'ciente_dados_publicos' => true,
            'ciente_prazo_busca' => true,
        ]);

        Estabelecimento::where('cnpj_basico', substr($cnpjLimpo, 0, 8))
            ->where('cnpj_ordem', substr($cnpjLimpo, 8, 4))
            ->where('cnpj_dv', substr($cnpjLimpo, 12, 2))
            ->delete();

        return redirect()->route('home')->with('success', 'Seus dados foram removidos do nosso site!');
    }

    private function formatarCnpj(string $cnpj): string
    {
        return vsprintf('%s.%s.%s/%s-%s', [
            substr($cnpj, 0, 2), substr($cnpj, 2, 3), substr($cnpj, 5, 3),
            substr($cnpj, 8, 4), substr($cnpj, 12, 2)
        ]);
    }

    private function jaRemovido(string $cnpj): bool
    {
        return SolicitacaoRemocao::where('cnpj', $cnpj)->exists();
    }
}
