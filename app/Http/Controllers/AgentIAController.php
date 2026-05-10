<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentIAController extends Controller
{
    public function index()
    {
        return view('agent');
    }

    public function chat(Request $request)
    {
        $message = strtolower($request->input('message'));
        $reply = $this->getResponse($message);
        return response()->json(['reply' => $reply]);
    }

    private function getResponse($message)
    {
        // Salutations
        if ($this->contains($message, ['bonjour', 'salut', 'bonsoir', 'hello', 'salam', 'coucou', 'bonne journée'])) {
            return "👋 Bonjour ! Je suis votre assistant bien-être étudiant. Je peux vous aider sur :\n• 🏃 Sport et exercice\n• 🧘 Méditation et stress\n• 🥗 Nutrition et alimentation\n• 😴 Sommeil et récupération\n• 📚 Concentration et études\n• 💪 Motivation\n• 🧠 Santé mentale\n\nQue puis-je faire pour vous ?";
        }

        // Remerciements
        if ($this->contains($message, ['merci', 'thanks', 'thank you', 'شكرا'])) {
            return "😊 Avec grand plaisir ! N'hésitez pas si vous avez d'autres questions. Prenez soin de vous ! 🌿";
        }

        // Au revoir
        if ($this->contains($message, ['au revoir', 'bye', 'à bientôt', 'bonne nuit', 'ciao'])) {
            return "👋 Au revoir ! Prenez soin de votre bien-être. À bientôt ! 🌟";
        }

        // Sport et exercice
        if ($this->contains($message, ['sport', 'exercice', 'entraînement', 'gym', 'musculation', 'cardio', 'course', 'jogging', 'natation', 'vélo', 'football', 'basketball', 'fitness'])) {
            if ($this->contains($message, ['commencer', 'débuter', 'débutant'])) {
                return "🏃 Pour commencer le sport en tant que débutant :\n• Commencez par 20-30 min de marche rapide 3x/semaine\n• Augmentez progressivement l'intensité\n• Échauffez-vous toujours avant et étirez-vous après\n• Buvez beaucoup d'eau\n• Reposez-vous 1-2 jours entre les séances\n\n💡 La régularité est plus importante que l'intensité !";
            }
            if ($this->contains($message, ['perdre', 'maigrir', 'poids', 'mincir'])) {
                return "⚖️ Pour perdre du poids avec le sport :\n• Privilégiez le cardio : marche rapide, vélo, natation\n• 45-60 min d'activité modérée 4-5x/semaine\n• Combinez avec une alimentation équilibrée\n• Évitez les régimes drastiques\n• Soyez patient : 0.5-1 kg/semaine est idéal\n\n🎯 La combinaison sport + nutrition est la clé !";
            }
            return "🏃 L'activité physique régulière est essentielle !\n• 30 min de sport modéré par jour minimum\n• Variez les activités : cardio, musculation, stretching\n• Trouvez un sport que vous aimez vraiment\n• Faites du sport avec des amis pour rester motivé\n• Même 10 min de marche comptent !\n\n💪 Bougez chaque jour, votre corps vous remerciera !";
        }

        // Méditation et relaxation
        if ($this->contains($message, ['méditation', 'méditer', 'relaxation', 'relaxer', 'respiration', 'pleine conscience', 'mindfulness', 'yoga', 'zen'])) {
            if ($this->contains($message, ['commencer', 'débuter', 'comment'])) {
                return "🧘 Comment commencer la méditation :\n• Trouvez un endroit calme et confortable\n• Commencez par 5 minutes par jour\n• Concentrez-vous sur votre respiration\n• Inspirez 4 sec → retenez 4 sec → expirez 4 sec\n• Augmentez progressivement à 15-20 min\n• Applications utiles : Calm, Headspace, Petit Bambou\n\n✨ La constance est plus importante que la durée !";
            }
            return "🧘 La méditation apporte de nombreux bienfaits :\n• Réduit le stress et l'anxiété de 40%\n• Améliore la concentration et la mémoire\n• Favorise un meilleur sommeil\n• Augmente la créativité\n• Renforce le système immunitaire\n\n💡 Technique simple : respirez profondément, inspirez 4 sec, retenez 4 sec, expirez 6 sec. Répétez 5 fois !";
        }

        // Stress et anxiété
        if ($this->contains($message, ['stress', 'stressé', 'anxieux', 'anxiété', 'angoisse', 'panique', 'nerveux', 'inquiet', 'peur'])) {
            return "💆 Pour gérer le stress et l'anxiété :\n• 🌬️ Respirez profondément (technique 4-4-6)\n• 🚶 Faites une courte marche de 10 min\n• 📝 Écrivez vos pensées dans un journal\n• 🎵 Écoutez de la musique apaisante\n• 🧘 Pratiquez la méditation 5 min/jour\n• 📵 Limitez les réseaux sociaux\n• 👥 Parlez à quelqu'un de confiance\n\n❤️ Le stress est normal, mais gérable. Vous n'êtes pas seul(e) !";
        }

        // Nutrition et alimentation
        if ($this->contains($message, ['nutrition', 'manger', 'alimentation', 'régime', 'nourriture', 'repas', 'petit-déjeuner', 'déjeuner', 'dîner', 'calories', 'protéines', 'glucides', 'légumes', 'fruits'])) {
            if ($this->contains($message, ['étudiant', 'budget', 'pas cher', 'économique'])) {
                return "🥗 Bien manger avec un petit budget étudiant :\n• Cuisinez vous-même, évitez la restauration rapide\n• Achetez des légumineuses : lentilles, pois chiches (peu chers et nutritifs)\n• Les œufs sont excellents et économiques\n• Achetez les fruits et légumes de saison\n• Préparez vos repas en avance (batch cooking)\n• Évitez les snacks industriels\n\n💰 Bien manger ne coûte pas forcément cher !";
            }
            if ($this->contains($message, ['concentration', 'cerveau', 'mémoire', 'examen'])) {
                return "🧠 Aliments pour booster la concentration :\n• 🐟 Poissons gras (saumon, sardines) : oméga-3\n• 🥑 Avocat : bons gras pour le cerveau\n• 🫐 Myrtilles : antioxydants puissants\n• 🥚 Œufs : choline pour la mémoire\n• 🌰 Noix et amandes : vitamine E\n• 🍫 Chocolat noir 70%+ : flavonoïdes\n• 💧 Eau : la déshydratation réduit la concentration de 20% !";
            }
            return "🥗 Conseils nutritionnels essentiels :\n• 5 portions de fruits et légumes par jour\n• Buvez 1.5 à 2L d'eau par jour\n• Petit-déjeuner complet et équilibré\n• Limitez sucre, sel et graisses saturées\n• Mangez lentement et sans écran\n• Ne sautez pas de repas\n• Préférez les aliments naturels aux transformés\n\n🌿 Votre alimentation est votre carburant !";
        }

        // Sommeil
        if ($this->contains($message, ['sommeil', 'dormir', 'fatigue', 'fatigué', 'insomnie', 'réveil', 'sieste', 'endormir', 'nuit'])) {
            if ($this->contains($message, ['insomnie', 'pas dormir', 'ne dors pas', 'difficile'])) {
                return "😴 Conseils contre l'insomnie :\n• Couchez-vous à la même heure chaque soir\n• Évitez les écrans 1h avant le coucher\n• Chambre fraîche (18-20°C) et sombre\n• Évitez caféine après 14h\n• Tisane de camomille ou valériane\n• Technique 4-7-8 : inspirez 4s, retenez 7s, expirez 8s\n• Évitez les siestes longues la journée\n\n💡 Si l'insomnie persiste, consultez un médecin !";
            }
            return "😴 Le sommeil est votre super-pouvoir !\n• 7 à 9 heures par nuit pour les étudiants\n• Horaires réguliers même le week-end\n• Chambre sombre, fraîche et silencieuse\n• Pas d'écran 1h avant le lit\n• Évitez l'alcool et la caféine le soir\n• Une courte sieste de 20 min peut aider\n• Le sommeil consolide la mémoire et l'apprentissage\n\n🌙 Bien dormir = mieux étudier !";
        }

        // Concentration et études
        if ($this->contains($message, ['concentration', 'étudier', 'réviser', 'examen', 'mémoire', 'apprendre', 'cours', 'université', 'école', 'travail', 'productivité'])) {
            return "📚 Techniques pour mieux étudier :\n• ⏱️ Méthode Pomodoro : 25 min de travail, 5 min de pause\n• 📝 Prenez des notes manuscrites\n• 🔄 Révisez régulièrement, pas tout la veille\n• 🧠 Testez-vous avec des questions\n• 🌿 Étudiez dans un endroit calme et ordonné\n• 📵 Éteignez les notifications\n• 💧 Hydratez-vous bien\n• 😴 Dormez bien avant un examen\n\n🎯 La régularité bat l'intensité !";
        }

        // Motivation
        if ($this->contains($message, ['motivat', 'démotivé', 'abandonner', 'difficile', 'dur', 'courage', 'continuer', 'persévérer'])) {
            return "💪 Pour retrouver la motivation :\n• Fixez-vous de petits objectifs quotidiens\n• Célébrez chaque petite victoire\n• Rappelez-vous pourquoi vous avez commencé\n• Entourez-vous de personnes positives\n• Visualisez votre succès\n• Faites une pause si nécessaire\n• Lisez des histoires inspirantes\n• Bougez votre corps : le sport booste la motivation\n\n🌟 Chaque grand voyage commence par un petit pas !";
        }

        // Santé mentale
        if ($this->contains($message, ['dépression', 'déprimé', 'triste', 'malheureux', 'seul', 'solitude', 'pleurer', 'mal', 'souffrir'])) {
            return "❤️ Je suis là pour vous soutenir.\n\nSi vous vous sentez mal :\n• Parlez à quelqu'un de confiance (ami, famille)\n• Consultez un médecin ou psychologue\n• Ne restez pas seul(e)\n• Faites des activités qui vous font plaisir\n• Sortez marcher, même 10 minutes\n• Évitez l'isolement\n\n🆘 En Tunisie, vous pouvez appeler :\n• SOS Amitié Tunisie : 71 20 20 20\n\n💙 Vous n'êtes pas seul(e), et ça va aller !";
        }

        // Hydratation
        if ($this->contains($message, ['eau', 'hydratation', 'boire', 'soif'])) {
            return "💧 L'hydratation est fondamentale !\n• Buvez 1.5 à 2L d'eau par jour minimum\n• Plus si vous faites du sport\n• Commencez la journée par un grand verre d'eau\n• Gardez une bouteille d'eau toujours avec vous\n• Les signes de déshydratation : fatigue, maux de tête, manque de concentration\n• L'eau améliore la concentration de 20% !\n\n💡 Si vous n'aimez pas l'eau nature, ajoutez du citron ou de la menthe !";
        }

        // Questions sur l'assistant
        if ($this->contains($message, ['qui es-tu', 'qui êtes-vous', 'que fais-tu', 'comment tu fonctionne', 'aide', 'quoi'])) {
            return "🤖 Je suis votre Assistant Bien-être IA !\n\nJe peux vous conseiller sur :\n• 🏃 Sport et activité physique\n• 🧘 Méditation et gestion du stress\n• 🥗 Nutrition et alimentation saine\n• 😴 Sommeil et récupération\n• 📚 Concentration et études\n• 💪 Motivation et persévérance\n• 🧠 Santé mentale et émotionnelle\n• 💧 Hydratation\n\nPosez-moi n'importe quelle question sur votre bien-être !";
        }

        // Réponse par défaut
        return "🌿 Je suis votre assistant bien-être ! Je peux vous conseiller sur :\n\n• 🏃 **Sport** : exercices, entraînement, perte de poids\n• 🧘 **Méditation** : relaxation, gestion du stress\n• 🥗 **Nutrition** : alimentation saine, repas équilibrés\n• 😴 **Sommeil** : insomnie, qualité du sommeil\n• 📚 **Études** : concentration, mémoire, révisions\n• 💪 **Motivation** : objectifs, persévérance\n• 🧠 **Santé mentale** : bien-être émotionnel\n\nPosez-moi votre question plus précisément et je ferai de mon mieux pour vous aider ! 😊";
    }

    private function contains($message, $keywords)
    {
        foreach ($keywords as $keyword) {
            if (str_contains($message, $keyword)) {
                return true;
            }
        }
        return false;
    }
}