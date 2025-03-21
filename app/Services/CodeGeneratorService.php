<?php

namespace App\Services;

use App\Models\CodeGenerator;
use Exception;

class CodeGeneratorService
{
    /**
     * Génère un code unique pour un client.
     *
     * @return string
     * @throws Exception
     */
    public function generateClientCode(): string
    {
        return $this->generateCode('client', 'CU');
    }

    /**
     * Génère un code unique pour un fournisseur.
     *
     * @return string
     * @throws Exception
     */
    public function generateFournisseurCode(): string
    {
        return $this->generateCode('fournisseur', 'SU');
    }

    /**
     * Génère un code unique pour un contact.
     *
     * @return string
     * @throws Exception
     */
    public function generateContactCode(): string
    {
        return $this->generateCode('contact', 'CO');
    }

    /**
     * Génère un code unique en fonction du type et du préfixe.
     *
     * @param string $type
     * @param string $prefix
     * @return string
     * @throws Exception
     */
    private function generateCode(string $type, string $prefix): string
    {
        // Récupère le dernier code généré pour ce type
        $lastCode = CodeGenerator::where('type', $type)->orderBy('id', 'desc')->first();

        // Si aucun code n'existe, initialise le premier code
        if (!$lastCode) {
            $newCode = $prefix . date('ym') . '-00001';
        } else {
            // Extraire la partie numérique après le tiret
            if (preg_match('/^(.*-)(\d+)$/', $lastCode->code, $matches)) {
                $prefixPart = $matches[1]; // Partie préfixe (ex: "CT2501-")
                $numberPart = $matches[2]; // Partie numérique (ex: "00001")

                // Incrémenter le numéro
                $newNumber = str_pad((int) $numberPart + 1, strlen($numberPart), '0', STR_PAD_LEFT);

                // Construire le nouveau code
                $newCode = $prefixPart . $newNumber;
            } else {
                throw new Exception("Le format du code existant est invalide.");
            }
        }

        // Enregistre le nouveau code dans la base de données
        CodeGenerator::create([
            'type' => $type,
            'code' => $newCode,
        ]);

        return $newCode;
    }
}