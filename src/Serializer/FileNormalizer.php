<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Serializer;

use Monofony\Contracts\Core\Model\Media\FileInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Vich\UploaderBundle\Storage\StorageInterface;

class FileNormalizer implements NormalizerInterface, SerializerAwareInterface
{
    public function __construct(
        private NormalizerInterface $decorated,
        private StorageInterface $storage
    ) {
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = $this->decorated->normalize($object, $format, $context);

        if ($object instanceof FileInterface) {
            if (null !== $object->getPath() && isset($data['path'])) {
                $data['path'] = $this->getFilePath($object);
            }
        }

        return $data;
    }

    public function setSerializer(SerializerInterface $serializer): void
    {
        if ($this->decorated instanceof SerializerAwareInterface) {
            $this->decorated->setSerializer($serializer);
        }
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return $this->decorated->supportsNormalization($data, $format);
    }

    private function getFilePath(FileInterface $file): ?string
    {
        return $this->storage->resolveUri($file, 'file');
    }
}
