<?php
namespace App\Controller;

use App\Entity\AboutMeData;
use App\Repository\AboutMeDataRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutMeController extends AbstractController
{
#[Route('/about-me', name: 'about_me')]
public function index(AboutMeDataRepository $aboutMeDataRepository): Response
{
$aboutMeData = $aboutMeDataRepository->findAll();

return $this->render('about_me/index.html.twig', [
'aboutMeData' => $aboutMeData,
]);
}

#[Route('/about-me/add', name: 'about_me_add')]
public function add(Request $request, EntityManagerInterface $entityManager): Response
{
$aboutMeData = new AboutMeData();
$form = $this->createForm(AboutMeDataType::class, $aboutMeData);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$entityManager->persist($aboutMeData);
$entityManager->flush();

return $this->redirectToRoute('about_me');
}

return $this->render('about_me/add.html.twig', [
'form' => $form->createView(),
]);
}

#[Route('/about-me/edit/{id}', name: 'about_me_edit')]
public function edit(Request $request, AboutMeData $aboutMeData, EntityManagerInterface $entityManager): Response
{
$form = $this->createForm(AboutMeDataType::class, $aboutMeData);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$entityManager->flush();

return $this->redirectToRoute('about_me');
}

return $this->render('about_me/edit.html.twig', [
'form' => $form->createView(),
]);
}

#[Route('/about-me/delete/{id}', name: 'about_me_delete', methods: ['POST'])]
public function delete(Request $request, AboutMeData $aboutMeData, EntityManagerInterface $entityManager): Response
{
if ($this->isCsrfTokenValid('delete'.$aboutMeData->getId(), $request->request->get('_token'))) {
$entityManager->remove($aboutMeData);
$entityManager->flush();
}

return $this->redirectToRoute('about_me');
}
}
